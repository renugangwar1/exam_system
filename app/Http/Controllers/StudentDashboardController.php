<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;
use Illuminate\Support\Facades\Schema;


class StudentDashboardController extends Controller
{
    public function index()
{
    $student = Auth::user();

   
    $exams = Exam::with('questions')
                ->where('status', true)
                ->orderBy('created_at', 'desc')
                ->get();

  
    $attempts = [];

    foreach ($exams as $exam) {
        $tableName = 'exam_attempt_' . $exam->id;

        if (Schema::hasTable($tableName)) {
            $attempt = DB::table($tableName)
                        ->where('user_id', $student->id)
                        ->first();

            if ($attempt) {
                $attempts[$exam->id] = $attempt;
            }
        }
    }

    return view('student.dashboard', compact('exams', 'attempts'));
}

}
