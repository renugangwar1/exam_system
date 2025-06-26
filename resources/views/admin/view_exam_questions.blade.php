@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h3 class="fw-bold">{{ $exam->title }}</h3>
        <p class="text-muted"><strong>Total Questions:</strong> {{ $exam->questions->count() }}</p>
    </div>

    <div class="table-wrapper border rounded bg-white shadow-sm p-3 animate__animated animate__fadeIn" 
         style="max-height: 600px; overflow-y: auto; scroll-behavior: smooth;">
         
        <table class="table table-bordered mb-0">
            <tbody>
                @foreach($exam->questions as $index => $q)
                <tr class="animate__animated animate__fadeInUp animate__faster">
                    <td class="bg-light">
                        <strong>Q{{ $index + 1 }}:</strong> {{ $q->question }}<br><br>
                        <div class="ms-3">
                            <span><strong>A.</strong> {{ $q->option_a }}</span><br>
                            <span><strong>B.</strong> {{ $q->option_b }}</span><br>
                            <span><strong>C.</strong> {{ $q->option_c }}</span><br>
                            <span><strong>D.</strong> {{ $q->option_d }}</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Include Animate.css CDN --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection
