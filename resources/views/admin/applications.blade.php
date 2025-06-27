@extends('layouts.app')

@section('content')
<div class="container mt-4 animate__animated animate__fadeIn">
    <h2 class="mb-4 text-center text-primary">
        <i class="fas fa-file-alt fa-bounce me-2 text-info animate__animated animate__bounce animate__infinite"></i> Submitted Applications
    </h2>

    @if($applications->count())
    <div class="table-responsive">
        <table class="table shadow-sm table-striped table-bordered custom-table">
            <thead class="text-center animate__animated animate__fadeInDown">
                <tr class="table-header text-white">
                    <th>#</th>
                    <th><i class="fas fa-user me-1"></i>Name</th>
                    <th><i class="fas fa-id-badge me-1"></i>Roll No</th>
                    <th><i class="fas fa-cogs me-1"></i>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $index => $application)
                <tr class="text-center table-row-animation animate__animated animate__fadeInUp">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->roll_no ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-shake me-1"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info text-center shadow-sm animate__animated animate__zoomIn">
            <i class="fas fa-info-circle me-2"></i>No submitted applications found.
        </div>
    @endif
</div>
@endsection

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .custom-table {
        border-radius: 10px;
        overflow: hidden;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .custom-table th, .custom-table td {
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table-header {
        background-color: #000 !important;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-row-animation {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .table-row-animation:hover {
        background-color: #e9f7ff;
        transform: scale(1.01);
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: scale(1.05);
        transition: all 0.2s ease-in-out;
    }

    h2 i {
        animation-duration: 1.2s;
    }
</style>
@endsection
