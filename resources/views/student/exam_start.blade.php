@extends('layouts.student')

@section('content')
<style>
    .exam-container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-in-out;
    }

    .question-card {
        background-color: #ffffff;
        border-left: 5px solid #0d6efd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }

    .question-card:hover {
        transform: scale(1.01);
    }

    .submit-btn {
        font-size: 1.2rem;
        padding: 10px 25px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: background 0.3s ease;
    }

    .submit-btn i {
        font-size: 1.3rem;
    }

    .submit-btn:hover {
        background-color: #218838 !important;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container mt-5">
    <div class="exam-container">

        <h3 class="mb-4 text-center">
            📝 {{ $exam->title }}
        </h3>

        @if ($attempt && $attempt->submitted)
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> You have already submitted this exam.
            </div>

            <button class="btn btn-secondary text-white" disabled>
                <i class="bi bi-lock-fill me-1"></i> Exam Submitted
            </button>
        @else
            <form method="POST" action="{{ route('submit_exam') }}">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                @foreach ($exam->questions as $index => $question)
                    <div class="question-card">
                        <p><strong>Q{{ $index + 1 }}. {{ $question->question }}</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="answers[{{ $question->id }}]" value="A" required> A. {{ $question->option_a }}</label><br>
                            <label><input type="radio" name="answers[{{ $question->id }}]" value="B"> B. {{ $question->option_b }}</label><br>
                            <label><input type="radio" name="answers[{{ $question->id }}]" value="C"> C. {{ $question->option_c }}</label><br>
                            <label><input type="radio" name="answers[{{ $question->id }}]" value="D"> D. {{ $question->option_d }}</label>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success submit-btn">
                        <i class="bi bi-send-check-fill"></i> Submit Exam
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>

{{-- Bootstrap icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
