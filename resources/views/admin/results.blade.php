@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-center"><i class="fas fa-chart-line me-2 text-primary"></i>Exam Results</h2>

    @php
        $groupedResults = collect($results)->groupBy('exam_id');
    @endphp

    @forelse($groupedResults as $examId => $examResults)

        @php
            $exam = $examResults->first()->exam;
            $submittedCount = $examResults->where('submitted', true)->count();
            $publishedCount = $examResults->where('submitted', true)->where('published', true)->count();
            $isPublished = $submittedCount > 0 && $submittedCount === $publishedCount;
        @endphp

        <div class="mb-5 p-4 bg-white border rounded shadow-sm animate__animated animate__fadeInUp">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="text-primary mb-1"><i class="fas fa-file-alt me-1"></i>{{ $exam->title }}</h4>
                    <small class="text-muted">Exam ID: <span class="fw-semibold">{{ $examId }}</span></small>
                </div>
                <form action="{{ route('admin.publish.results') }}" method="POST" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ $examId }}">
                    <button type="submit" class="btn {{ $isPublished ? 'btn-danger' : 'btn-success' }}">
                        <i class="fas {{ $isPublished ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                        {{ $isPublished ? 'Unpublish Results' : 'Publish Results' }}
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-id-card"></i> Student ID</th>
                            <th><i class="fas fa-user"></i> Name</th>
                            <th><i class="fas fa-hashtag"></i> Roll No</th>
                            <th><i class="fas fa-star"></i> Score</th>
                            <th><i class="fas fa-medal"></i> Rank</th>
                            <th><i class="fas fa-file-pdf"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($examResults as $result)
                            <tr>
                                <td>{{ optional($result->user)->id ?? 'N/A' }}</td>
                                <td>{{ optional($result->user)->name ?? 'N/A' }}</td>
                                <td>{{ optional($result->user)->roll_no ?? 'N/A' }}</td>
                                <td><span class="badge bg-info text-dark">{{ $result->score }}</span></td>
                                <td><span class="badge bg-warning text-dark">{{ $result->rank }}</span></td>
                                <td>
                                    @if ($result->user)
                                        <a href="{{ route('admin.download.answersheet', [$exam->id, $result->user->id]) }}"
                                           class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="fas fa-download me-1"></i> PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No User</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No records found for this exam.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    @empty
        <p class="text-muted text-center">No exam results found.</p>
    @endforelse
</div>

{{-- Animate.css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection
