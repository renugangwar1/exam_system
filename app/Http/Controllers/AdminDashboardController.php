<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExamTemplateExport;
use App\Models\ExamAttempt;
use App\Models\Application;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createExam()
    {
        $papers = Exam::latest()->get();
        return view('admin.create_exam', compact('papers'));
    }

public function uploadExam(Request $request)
{
    $request->validate([
        'exam_title' => 'required|string|unique:exams,title',
        'exam_file' => 'required|file|mimes:xlsx,csv',
    ]);

    try {
        // Create the exam
        $exam = Exam::create([
            'title' => $request->exam_title
        ]);

        // Read file
        $file = $request->file('exam_file');
        $data = Excel::toArray([], $file);
        $rows = $data[0]; // First sheet

        foreach ($rows as $index => $row) {
            if ($index === 0) continue; 

           
        Question::create([
    'exam_id' => $exam->id,
    'question' => $row[0],
    'option_a' => $row[1],
    'option_b' => $row[2],
    'option_c' => $row[3],
    'option_d' => $row[4],
    'correct_answer' => strtoupper($row[5]),
    'marks' => (int) $row[6],
]);
        }

        return redirect()->back()->with('success', 'Exam and questions uploaded successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error uploading exam: ' . $e->getMessage());
    }
}


public function viewResults()
{
    $results = [];

    $exams = Exam::all();

    foreach ($exams as $exam) {
        $tableName = 'exam_attempt_' . $exam->id;

        if (\Schema::hasTable($tableName)) {
            $submittedAttempts = \DB::table($tableName)
                ->where('submitted', true)
                ->get()
                ->map(function ($attempt) use ($exam) {
                    $attempt->exam = $exam;
                    $attempt->user = \App\Models\User::find($attempt->user_id);
                    return $attempt;
                });

            $results = array_merge($results, $submittedAttempts->toArray());
        }
    }

    return view('admin.results', compact('results'));
}



   public function viewApplications()
{
   
    $applications = Application::where('submitted', true)->get();

    return view('admin.applications', compact('applications'));
}

    public function manageStudents()
    {
      

    // $students = User::all(); 
    $students = User::where('role', 'student')->get();

    return view('admin.students', compact('students'));
}
    

    public function downloadTemplate()
{
    return Excel::download(new ExamTemplateExport, 'exam_template.xlsx');
}

public function viewExamQuestions($id)
{
    $exam = Exam::findOrFail($id);
    $questions = Question::where('exam_id', $id)->get();

    return view('admin.view_exam_questions', compact('exam', 'questions'));
}

public function deleteExam($id)
{
    $exam = Exam::findOrFail($id);

    
    $exam->questions()->delete();

    // Delete exam
    $exam->delete();

    return redirect()->route('admin.create_exam')->with('success', 'Exam deleted successfully.');
}

public function toggleExamStatus($id)
{
    $exam = Exam::findOrFail($id);
    $exam->status = !$exam->status;
    $exam->save();

    return back()->with('success', 'Exam status updated successfully.');
}
public function publishResults()
{
    $exams = Exam::all();
    $hasSubmitted = false;

    foreach ($exams as $exam) {
        $tableName = 'exam_attempt_' . $exam->id;

        if (\Schema::hasTable($tableName)) {
            $submitted = \DB::table($tableName)->where('submitted', true)->get();

            if ($submitted->isNotEmpty()) {
                $hasSubmitted = true;

                $alreadyPublished = $submitted->first()->published ?? false;
                $newState = !$alreadyPublished;

              
                \DB::table($tableName)->where('submitted', true)->update(['published' => $newState]);

                if ($newState) {
                    // Assign ranks
                    $ranked = $submitted->sortByDesc('score')->values();
                    foreach ($ranked as $index => $attempt) {
                        \DB::table($tableName)->where('id', $attempt->id)->update(['rank' => $index + 1]);
                    }
                } else {
                    // Unpublish: remove ranks
                    \DB::table($tableName)->where('submitted', true)->update(['rank' => null]);
                }
            }
        }
    }

    if (!$hasSubmitted) {
        return redirect()->back()->with('error', 'No submitted results found.');
    }

    return redirect()->back()->with('success', 'Results ' . ($newState ? 'published' : 'unpublished') . ' successfully.');
}

public function destroyUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'Student deleted successfully.');
}

public function destroyApplication($id)
{
    $application = Application::findOrFail($id);
    $application->delete();

    return redirect()->back()->with('success', 'Application deleted successfully.');
}


}
