@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Upload Exam Form --}}
            <div class="card shadow-lg border-0 animate__animated animate__fadeIn mb-5">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-upload me-2"></i>Create New Exam Paper</h5>
                </div>
                <div class="card-body bg-light">

                    <form action="{{ route('admin.upload_exam') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="exam_title" class="form-label fw-semibold">Paper Title</label>
                            <input type="text" name="exam_title" class="form-control shadow-sm" placeholder="e.g. Mathematics Quiz 2025" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Download Template</label><br>
                            <a href="{{ route('admin.download_template') }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-download me-1"></i>Download Template
                            </a>
                            <div class="form-text mt-1">Use this template to upload questions, options, and marks.</div>
                        </div>

                        <div class="mb-4">
                            <label for="exam_file" class="form-label fw-semibold">Upload Excel/CSV File</label>
                            <input type="file" name="exam_file" class="form-control shadow-sm" accept=".csv,.xlsx" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-paper-plane me-1"></i>Upload & Create Paper
                            </button>
                        </div>
                    </form>
                </div>
            </div>

      {{-- Created Papers --}}
<div class="card shadow-lg border-0 animate__animated animate__fadeIn mb-5">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">
            <i class="fas fa-file-alt me-2"></i>Created Exam Papers
        </h5>
    </div>

   
    <div class="card-body bg-light p-3 scrollable-list">
        @if($papers->count())
            <div class="list-group list-group-flush">
                @foreach($papers as $paper)
                    <div class="list-group-item bg-white rounded shadow-sm mb-3 animate__animated animate__fadeInUp d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong class="fs-6">{{ $paper->title }}</strong><br>
                            <small class="text-muted">Created on: {{ $paper->created_at->format('d M Y, h:i A') }}</small><br>
                            <span class="badge rounded-pill mt-1 {{ $paper->status ? 'bg-success' : 'bg-secondary' }}">
                                <i class="fas {{ $paper->status ? 'fa-check' : 'fa-times' }}"></i>
                                {{ $paper->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
<div class="d-flex gap-3 mt-2">
  
    <a href="{{ route('admin.view_exam_questions', $paper->id) }}" class="icon-only text-secondary" title="View">
        <i class="fas fa-eye"></i>
    </a>

  
    <form action="{{ route('admin.toggle_exam_status', $paper->id) }}" method="POST">
        @csrf
        <button type="submit" class="icon-only {{ $paper->status ? 'text-warning' : 'text-success' }}" title="Toggle Status">
            <i class="fas {{ $paper->status ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
        </button>
    </form>

   
    <form action="{{ route('admin.delete_exam', $paper->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this exam?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="icon-only text-danger" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>


                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No exam papers created yet.</p>
        @endif
    </div>
</div>



        </div>
    </div>

</div>

{{-- Include Animate.css CDN --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

{{-- Ensure Font Awesome is Loaded --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection

<style>
    .scrollable-list {
        max-height: 300px;
        overflow-y: auto;
        scroll-behavior: smooth;
    }

    .scrollable-list::-webkit-scrollbar {
        width: 8px;
    }

    .scrollable-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .scrollable-list::-webkit-scrollbar-thumb {
        background-color: #bbb;
        border-radius: 10px;
        border: 2px solid #f1f1f1;
    }

    .scrollable-list::-webkit-scrollbar-thumb:hover {
        background-color: #999;
    }

   .icon-only {
    background: none;
    border: none;
    padding: 0;
    font-size: 18px;
    line-height: 1;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.icon-only:hover {
    transform: scale(1.2);
}

.icon-only i {
    pointer-events: none;
}
</style>
