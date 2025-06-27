@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4 animate__animated animate__fadeInDown">
        <h2 class="fw-bold text-primary"><i class="fas fa-file-alt me-2"></i>{{ $exam->title }}</h2>
        <p class="text-muted"><strong>Total Questions:</strong> {{ $exam->questions->count() }}</p>
    </div>

    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                @foreach($exam->questions as $index => $q)
                <tr class="animate__animated animate__fadeInUp animate__faster mb-3">
                    <td class="bg-white p-4 shadow-sm rounded border" colspan="5">
                        <div class="mb-2">
                            <span class="fw-semibold text-dark">Q{{ $index + 1 }}:</span>
                            <span class="ms-1">{{ $q->question }}</span>
                        </div>
                        <div class="ps-3">
                            <div class="mb-1"><strong>A)</strong> {{ $q->option_a }}</div>
                            <div class="mb-1"><strong>B)</strong> {{ $q->option_b }}</div>
                            <div class="mb-1"><strong>C)</strong> {{ $q->option_c }}</div>
                            <div class="mb-1"><strong>D)</strong> {{ $q->option_d }}</div>
                        </div>
                        <div class="mt-3 d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-check-circle text-success me-1"></i>Correct Answer: <strong>{{ $q->correct_answer }}</strong></span>
                            <span><i class="fas fa-star text-warning me-1"></i>Marks: {{ $q->marks }}</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>


<style>
    body {
        background-color: #f8f9fa;
    }
    table {
        margin-bottom: 0;
    }
    td {
        transition: box-shadow 0.3s ease-in-out;
    }
    td:hover {
        box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }
</style>
@endsection
