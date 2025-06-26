@extends('layouts.app')

@section('content')

<!-- ✅ Animated SVG Background -->
<div class="svg-background">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 800" preserveAspectRatio="xMidYMid slice">
        <rect fill="#000000" width="800" height="800"/>
        <g fill-opacity="1">
            <circle class="circle pulse delay-0" fill="#000000" cx="400" cy="400" r="600"/>
            <circle class="circle pulse delay-1" fill="#001934" cx="400" cy="400" r="500"/>
            <circle class="circle pulse delay-2" fill="#002744" cx="400" cy="400" r="400"/>
            <circle class="circle pulse delay-3" fill="#003654" cx="400" cy="400" r="300"/>
            <circle class="circle pulse delay-4" fill="#164666" cx="400" cy="400" r="200"/>
            <circle class="circle pulse delay-5" fill="#2B5677" cx="400" cy="400" r="100"/>
        </g>
    </svg>
</div>

<!-- ✅ Main Content -->
<div class="container mt-5 position-relative" style="z-index: 2;">
<h2 class="mb-5 text-center fw-bold text-uppercase" style="color: gold;">Welcome to Admin Dashboard</h2>

    <div class="row g-4">
        @foreach ([
            ['icon' => 'fa-file-alt', 'color' => 'primary', 'title' => 'Create Exam', 'desc' => 'Set up new exams and upload papers.', 'route' => 'admin.create_exam'],
            ['icon' => 'fa-chart-bar', 'color' => 'success', 'title' => 'View Results', 'desc' => 'Check exam results of students.', 'route' => 'admin.results'],
            ['icon' => 'fa-file-signature', 'color' => 'warning text-dark', 'title' => 'Applications', 'desc' => 'Review user-submitted applications.', 'route' => 'admin.applications'],
            ['icon' => 'fa-user-graduate', 'color' => 'info', 'title' => 'Manage Students', 'desc' => 'Add, edit, or remove student accounts.', 'route' => 'admin.students']
        ] as $card)
        <div class="col-md-3">
            <div class="card shadow-lg border-0 h-100 animate-card glass-effect">
                <div class="card-body text-center">
                    <i class="fas {{ $card['icon'] }} fa-3x mb-3 text-{{ explode(' ', $card['color'])[0] }}"></i>
                    <h5 class="card-title fw-semibold">{{ $card['title'] }}</h5>
                    <p class="card-text">{{ $card['desc'] }}</p>
                    <a href="{{ route($card['route']) }}" class="btn btn-{{ $card['color'] }} glow-on-hover">view</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ✅ Styles & Animation -->
<style>
    body {
        background: none !important;
        overflow-x: hidden;
    }

    .svg-background {
        position: fixed;
        top: 0;
        left: 0;
        z-index: -10;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .text-gradient {
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .animate-card {
        transition: all 0.4s ease;
        border-radius: 1rem;
    }

    .animate-card:hover {
        transform: translateY(-8px) scale(1.03);
    }

    .card i {
        transition: transform 0.3s ease;
    }

    .card:hover i {
        transform: rotate(8deg) scale(1.2);
    }

    .glow-on-hover {
        transition: 0.3s ease;
        box-shadow: 0 0 0 transparent;
    }

    .glow-on-hover:hover {
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .card-text,
    .card-title {
        color: white;
    }

    /* ✅ SVG Circle Animation */
    .pulse {
        transform-origin: 50% 50%;
        animation: pulse 6s ease-in-out infinite;
    }

    .delay-0 { animation-delay: 0s; }
    .delay-1 { animation-delay: 0.5s; }
    .delay-2 { animation-delay: 1s; }
    .delay-3 { animation-delay: 1.5s; }
    .delay-4 { animation-delay: 2s; }
    .delay-5 { animation-delay: 2.5s; }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.05);
            opacity: 0.85;
        }
    }
</style>
@endsection
