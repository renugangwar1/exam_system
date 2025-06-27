@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-5 text-center fw-bold text-uppercase" style="color: gold;">👩‍🎓 Students</h1>

    @if($students->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center shadow-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Email</th>
                    <th>Registered At</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->roll_no ?? 'N/A' }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->created_at->format('d M Y') }}</td>
                    <td>
                     <form action="{{ route('users.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info text-center">No students found.</div>
    @endif
</div>
@endsection
