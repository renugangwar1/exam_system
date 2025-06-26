@extends('layouts.student')

@section('content')
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
   body {
    margin: 0;
    padding: 0;
    position: relative;
    min-height: 100vh;
    font-family: system-ui, sans-serif;
    background: transparent; /* Ensure no other background */
}
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

.container {
    position: relative;
    z-index: 1;
}


    .fade-in {
        animation: fadeIn 0.6s ease-in-out both;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .welcome-box {
        background: linear-gradient(to right, #4ade80, #22c55e);
        color: white;
        padding: 20px 25px;
        border-radius: 12px;
        margin-bottom: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
    }

    .welcome-box i {
        font-size: 1.8rem;
        margin-right: 10px;
    }

    .wave-container {
        margin-bottom: 30px;
        line-height: 0;
        z-index: 0;
        position: relative;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #1e293b;
        margin-bottom: 25px;
    }

    .exam-card {
        border: none;
        border-radius: 12px;
        background-color: #ffffff;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    }

    .exam-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .exam-icon {
        font-size: 2rem;
        color: #0d6efd;
        margin-right: 15px;
    }

    .exam-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 3px;
    }

    .exam-date {
        font-size: 0.9rem;
        color: #64748b;
    }

    .btn-start {
        background-color: #0d6efd;
        border: none;
        padding: 8px 20px;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-start:hover {
        background-color: #0b5ed7;
    }

    .badge-submitted {
        font-size: 0.85rem;
        padding: 7px 14px;
        border-radius: 8px;
    }

    .no-exams {
        font-style: italic;
        color: #64748b;
        font-size: 1rem;
    }

    /* Responsive SVG Wave */

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


.container {
    position: relative;
    z-index: 1;
}

</style>
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
            <!-- Animated shapes remain unchanged -->
            <!-- 🔷 Triangle -->
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

            <!-- 🔶 Others -->
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



<div class="container mt-4 fade-in">

    {{-- ✅ Welcome Message --}}
    <div class="welcome-box d-flex align-items-center fade-in">
        <i class="bi bi-person-circle"></i>
        <div>
            <div class="fw-semibold fs-5 mb-1">Welcome, {{ Auth::user()->name }}!</div>
            <div>🎓 Roll No: <strong>{{ Auth::user()->roll_no }}</strong></div>
        </div>
    </div>

    <br>
  

    {{-- 📚 Section Title --}}
   <div class="section-title" style="color: #FFD700;">

        <i class="bi bi-journal-text text-primary me-2"></i>Available Exams
    </div>

    {{-- 📄 Exam Cards --}}
    @forelse ($exams as $exam)
        @php $attempt = $attempts[$exam->id] ?? null; @endphp

        <div class="exam-card d-flex justify-content-between align-items-center fade-in">
            <div class="d-flex align-items-center">
                <i class="bi bi-file-earmark-text exam-icon"></i>
                <div>
                    <div class="exam-title">{{ $exam->title }}</div>
                    <div class="exam-date">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ $exam->created_at->format('d M Y, h:i A') }}
                    </div>
                </div>
            </div>
            <div>
                @if ($attempt && $attempt->submitted)
                    <span class="badge bg-secondary badge-submitted">
                        <i class="bi bi-check-circle-fill me-1"></i> Submitted
                    </span>
                @else
                    <a href="{{ route('exam.start', $exam->id) }}" class="btn btn-start text-white">
                        <i class="bi bi-play-circle me-1"></i> Start
                    </a>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-light border text-center fade-in">
            <i class="bi bi-exclamation-circle me-2 text-muted"></i>
            <span class="no-exams">No exams available at the moment.</span>
        </div>
    @endforelse

</div>
@endsection
