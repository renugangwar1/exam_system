@extends('layouts.student')

@section('content')

<div class="dashboard-svg-bg">
    <svg xmlns="http://www.w3.org/2000/svg" 
         width="100%" height="100%" 
         viewBox="0 0 1920 1080" 
         preserveAspectRatio="none">
         
        <rect fill="#1e293b" width="1920" height="1080"/>
        
        <defs>
            <linearGradient id="a" gradientTransform="rotate(100)">
                <stop offset="0" stop-color="#0FF"/>
                <stop offset="1" stop-color="#CF6"/>
            </linearGradient>
            <linearGradient id="b" gradientTransform="rotate(5)">
                <stop offset="0" stop-color="#F00"/>
                <stop offset="1" stop-color="#FC0"/>
            </linearGradient>
        </defs>

        <g fill="none" stroke-miterlimit="10">
          
            
            <g stroke="url(#a)" stroke-width="21.12">
                <path d="M1409 581 1450.35 511 1490 581z">
                    <animateTransform attributeName="transform" type="rotate" values="0 1450 546; 360 1450 546" dur="8s" repeatCount="indefinite"/>
                </path>
                <path d="M400.86 735.5h-83.73c0-23.12 18.74-41.87 41.87-41.87S400.86 712.38 400.86 735.5z">
                    <animateTransform attributeName="transform" type="rotate" values="0 360 714; 360 360 714" dur="8s" repeatCount="indefinite"/>
                </path>
                <circle cx="500" cy="100" r="40" stroke-width="7.04">
                    <animateTransform attributeName="transform" type="rotate" values="0 500 100;360 500 100" dur="8s" repeatCount="indefinite"/>
                </circle>
                <polygon points="250,75 263,110 300,110 270,130 283,165 250,145 217,165 230,130 200,110 237,110" stroke-width="5">
                    <animateTransform attributeName="transform" type="rotate" values="0 250 120;360 250 120" dur="8s" repeatCount="indefinite"/>
                </polygon>
            </g>

            <g stroke="url(#b)" stroke-width="6.4">
                <path d="M149.8 345.2 118.4 389.8 149.8 434.4 181.2 389.8z">
                    <animateTransform attributeName="transform" type="rotate" values="0 150 390;360 150 390" dur="8s" repeatCount="indefinite"/>
                </path>
                <rect x="1039" y="709" width="100" height="100" stroke-width="14.08">
                    <animateTransform attributeName="transform" type="rotate" values="0 1089 759;360 1089 759" dur="8s" repeatCount="indefinite"/>
                </rect>
                <path d="M1400 100 
                         L1373.2 115 
                         L1373.2 145 
                         L1400 160 
                         L1426.8 145 
                         L1426.8 115 
                         Z">
                    <animateTransform attributeName="transform" type="rotate" values="0 1400 130;360 1400 130" dur="8s" repeatCount="indefinite"/>
                </path>
                <path d="M1100,250 
                         q25,-25 50,0 
                         q25,25 0,50 
                         q-25,25 -50,0 
                         q-25,-25 0,-50 
                         q25,-25 50,0 
                         q25,25 0,50" 
                      fill="none">
                    <animateTransform attributeName="transform" type="rotate" values="0 1100 250; 360 1100 250" dur="8s" repeatCount="indefinite"/>
                </path>
                <ellipse cx="800" cy="400" rx="60" ry="30" stroke-width="6">
                    <animateTransform attributeName="transform" type="translate" values="0 0; 0 15; 0 0" dur="8s" repeatCount="indefinite"/>
                </ellipse>
            </g>
        </g>
    </svg>
</div>



<div class="container mt-4" style="position: relative; z-index: 1;">
    <div class="results-container">
        <h2 class="mb-4 text-center text-primary">
            <i class="bi bi-bar-chart-fill me-2"></i> Your Exam Results
        </h2>

        @if($results->count())
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm results-table">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th><i class="bi bi-person-fill icon"></i> Name</th>
                        <th><i class="bi bi-hash icon"></i> Roll No</th>
                        <th><i class="bi bi-journal-text icon"></i> Exam Title</th>
                        <th><i class="bi bi-star-fill icon"></i> Score</th>
                        <th><i class="bi bi-trophy-fill icon"></i> Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr class="text-center">
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ Auth::user()->roll_no ?? 'N/A' }}</td>
                            <td>{{ $result->exam->title ?? 'N/A' }}</td>
                            <td class="text-success fw-bold">{{ $result->score }}</td>
                            <td class="text-warning fw-semibold">{{ $result->rank }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle-fill"></i> Your results will appear here once published.
        </div>
        @endif
    </div>
</div>


<style>
  
.dashboard-svg-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 0;
    opacity: 1;
    pointer-events: none;
    overflow: hidden;
}

    .results-container {
        background: #f9f9f9;
        padding: 30px;
        border-radius: 15px;
        animation: fadeIn 0.6s ease-in-out;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .results-table th, .results-table td {
        vertical-align: middle !important;
    }

    .results-table tr:hover {
        background-color: #eaf4ff;
        transition: all 0.2s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .icon {
        font-size: 1.2rem;
        color: #0d6efd;
    }

    .alert-info i {
        margin-right: 10px;
    }
</style>
@endsection
