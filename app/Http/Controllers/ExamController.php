<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamAttempt;
use App\Models\Application; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use PDF;

class ExamController extends Controller
{
 public function start($id)
{
    $student = Auth::user();
    $exam = Exam::with('questions')->findOrFail($id);
    $tableName = 'exam_attempt_' . $id;

    // Create table if not exists
    $this->createExamAttemptTable($id);

    // Check if already submitted in dynamic table
    $attempt = DB::table($tableName)
                ->where('user_id', $student->id)
                ->first();

    if ($attempt && $attempt->submitted) {
        return redirect()->route('student.dashboard')
            ->with('error', 'You have already attempted this exam.');
    }

    // Create empty record if not exists
    if (!$attempt) {
        DB::table($tableName)->insert([
            'user_id' => $student->id,
            'exam_id' => $id,
            'submitted' => false,
            'score' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $attempt = DB::table($tableName)
            ->where('user_id', $student->id)
            ->first();
    }

    return view('student.exam_start', [
        'exam' => $exam,
        'student' => $student,
        'attempt' => $attempt
    ]);
}

public function submit(Request $request)
{
    $user = Auth::user();
    $examId = $request->input('exam_id');
    $submittedAnswers = $request->input('answers');

    $exam = Exam::with('questions')->findOrFail($examId);
    $score = 0;

    $this->createExamAttemptTable($examId);
    $tableName = 'exam_attempt_' . $examId;

    foreach ($exam->questions as $question) {
        $answered = $submittedAnswers[$question->id] ?? null;

        // Calculate score for correct MCQ
        if ($answered === $question->correct_answer) {
            $score += $question->marks;
        }

        // Save the answer (even if it's null)
        DB::table('student_answers')->updateOrInsert(
            [
                'user_id' => $user->id,
                'exam_id' => $examId,
                'question_id' => $question->id,
            ],
            [
                'answer' => $answered,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    // Insert or update the exam_attempt_X table
    DB::table($tableName)->updateOrInsert(
        ['user_id' => $user->id],
        [
            'exam_id' => $examId,
            'score' => $score,
            'submitted' => true,
            'updated_at' => now(),
        ]
    );

    // Recalculate rank
    $scores = DB::table($tableName)
        ->where('submitted', true)
        ->orderByDesc('score')
        ->pluck('score');

    $rank = $scores->search($score) + 1;

    DB::table($tableName)->where('user_id', $user->id)->update([
        'rank' => $rank,
    ]);

    // Optional: store in applications table
    Application::updateOrInsert(
        ['user_id' => $user->id, 'exam_id' => $examId],
        [
            'name' => $user->name,
            'roll_no' => $user->roll_no ?? 'N/A',
            'score' => $score,
            'rank' => $rank,
            'submitted' => true,
        ]
    );

    return redirect()->route('student.dashboard')
        ->with('success', 'Exam submitted successfully. Your Rank: ' . $rank);
}



public function viewExamResults($examId)
{
    $tableName = 'exam_attempt_' . $examId;

    if (!Schema::hasTable($tableName)) {
        abort(404, 'Result table not found.');
    }

    $results = DB::table($tableName)
        ->join('users', 'users.id', '=', $tableName . '.user_id')
        ->select('users.name', 'users.roll_no', $tableName . '.*')
        ->where('submitted', true)
        ->where('published', true)
        ->orderBy('rank')
        ->get();

    return view('admin.exam_results', compact('results', 'examId'));
}

// public function publishResults()
// {
//     // Publish all submitted attempts (customize condition if needed)
//     ExamAttempt::where('submitted', true)->update(['published' => true]);

//     // Optional: assign ranks
//     $exams = ExamAttempt::select('exam_id')->distinct()->get();

//     foreach ($exams as $exam) {
//         $attempts = ExamAttempt::where('exam_id', $exam->exam_id)
//             ->where('submitted', true)
//             ->orderByDesc('score')
//             ->get();

//         $rank = 1;
//         foreach ($attempts as $attempt) {
//             $attempt->rank = $rank++;
//             $attempt->save();
//         }
//     }

//     return redirect()->back()->with('success', 'Results published successfully!');
// }
public function publishResults(Request $request)
{
    $examId = $request->input('exam_id');
    $tableName = 'exam_attempt_' . $examId;

    if (!Schema::hasTable($tableName)) {
        return back()->with('error', 'No attempt data found for this exam.');
    }

    $submittedCount = DB::table($tableName)->where('submitted', true)->count();
    $publishedCount = DB::table($tableName)->where('submitted', true)->where('published', true)->count();

    $toggle = $submittedCount !== $publishedCount;

    // Toggle publish status
    DB::table($tableName)->where('submitted', true)->update(['published' => $toggle]);

    // Reassign ranks if publishing
    if ($toggle) {
        $attempts = DB::table($tableName)
            ->where('submitted', true)
            ->orderByDesc('score')
            ->get();

        $rank = 1;
        foreach ($attempts as $attempt) {
            DB::table($tableName)->where('id', $attempt->id)->update(['rank' => $rank++]);
        }
    }

    return redirect()->back()->with('success', 'Results updated for Exam ID: ' . $examId);
}


public function results()
{
    $user = Auth::user();
    $examTables = DB::select("SHOW TABLES LIKE 'exam_attempt_%'");
    $results = collect();

    foreach ($examTables as $table) {
        $tableName = array_values((array) $table)[0];

        if (Schema::hasColumn($tableName, 'user_id') &&
            Schema::hasColumn($tableName, 'submitted') &&
            Schema::hasColumn($tableName, 'published')) {

            $record = DB::table($tableName)
                ->where('user_id', $user->id)
                ->where('submitted', true)
                ->where('published', true)
                ->first();

            if ($record) {
                $examId = str_replace('exam_attempt_', '', $tableName);
                $exam = Exam::find($examId);

                if ($exam) {
                    // Calculate rank
                    $scores = DB::table($tableName)
                        ->where('submitted', true)
                        ->where('published', true)
                        ->orderByDesc('score')
                        ->pluck('score');

                    $rank = $scores->search($record->score) + 1;

                    $results->push((object)[
                        'exam_id' => $examId,
                        'exam' => $exam,
                        'score' => $record->score,
                        'rank' => $rank,
                        'submitted_at' => $record->updated_at,
                    ]);
                }
            }
        }
    }

    return view('student.results', compact('results'));
}




public function createExamAttemptTable($examId)
{
    $tableName = 'exam_attempt_' . $examId;

    // Check if table already exists
    if (!Schema::hasTable($tableName)) {
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exam_id');
            $table->integer('score')->default(0);
            $table->integer('rank')->nullable();
            $table->boolean('submitted')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }
}


public function downloadAnswerSheet($examId, $userId)
{
    $exam = Exam::with('questions')->findOrFail($examId);
    $user = \App\Models\User::findOrFail($userId);

    $answers = DB::table('student_answers')
        ->where('exam_id', $examId)
        ->where('user_id', $userId)
        ->get()
        ->keyBy('question_id');

    $tableName = 'exam_attempt_' . $examId;
    $attempt = DB::table($tableName)
        ->where('user_id', $userId)
        ->first();

    $pdf = PDF::loadView('admin.pdf_answer_sheet', [
        'exam' => $exam,
        'user' => $user,
        'answers' => $answers,
        'attempt' => $attempt,
    ]);

    return $pdf->download("AnswerSheet_{$user->name}_Exam{$examId}.pdf");
}
}
