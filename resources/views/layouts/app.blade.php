<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: none;
            overflow-x: hidden;
            position: relative;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            z-index: 10;
        }

        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            position: relative;
            z-index: 2;
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
        .sidebar svg {
    pointer-events: none;
    z-index: 0;
}
    </style>
</head>
<body>

  
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

   
    <!-- Sidebar -->
<div class="sidebar position-relative">

 <!--  Top Left Circle & Wave -->

<!--  Bottom Right Rounded Square -->
<svg class="position-absolute bottom-0 end-0" width="80" height="80" viewBox="0 0 100 100" fill="none"
     xmlns="http://www.w3.org/2000/svg" style="opacity: 0.35;">
    <rect x="10" y="10" width="80" height="80" rx="20" stroke="#adb5bd" stroke-width="4"/>
    <line x1="10" y1="90" x2="90" y2="10" stroke="#adb5bd" stroke-width="2"/>
</svg>

<!--  Top Right Zigzag -->
<svg class="position-absolute top-0 end-0" width="60" height="60" viewBox="0 0 100 100" fill="none"
     xmlns="http://www.w3.org/2000/svg" style="opacity: 0.3;">
    <polyline points="10,90 30,10 50,90 70,10 90,90" stroke="#ced4da" stroke-width="3" fill="none"/>
</svg>

<!--  Bottom Left Spiral -->
<svg class="position-absolute bottom-0 start-0" width="60" height="60" viewBox="0 0 100 100" fill="none"
     xmlns="http://www.w3.org/2000/svg" style="opacity: 0.3;">
    <path d="M50,50 m-30,0 a30,30 0 1,1 60,0 a30,30 0 1,1 -60,0" stroke="#dee2e6" stroke-width="2.5" fill="none"/>
</svg>

<!--  Center Left Line Pattern -->
<svg class="position-absolute top-50 start-0 translate-middle-y" width="50" height="100" viewBox="0 0 100 100" fill="none"
     xmlns="http://www.w3.org/2000/svg" style="opacity: 0.4;">
    <line x1="20" y1="0" x2="20" y2="100" stroke="#adb5bd" stroke-width="2"/>
    <line x1="40" y1="0" x2="40" y2="100" stroke="#adb5bd" stroke-width="2"/>
    <line x1="60" y1="0" x2="60" y2="100" stroke="#adb5bd" stroke-width="2"/>
</svg>

<!--  Center Right Dotted Grid -->
<svg class="position-absolute top-50 end-0 translate-middle-y" width="50" height="100" viewBox="0 0 100 100" fill="none"
     xmlns="http://www.w3.org/2000/svg" style="opacity: 0.4;">
    <circle cx="20" cy="20" r="4" fill="#adb5bd"/>
    <circle cx="20" cy="50" r="4" fill="#adb5bd"/>
    <circle cx="20" cy="80" r="4" fill="#adb5bd"/>
    <circle cx="50" cy="20" r="4" fill="#adb5bd"/>
    <circle cx="50" cy="50" r="4" fill="#adb5bd"/>
    <circle cx="50" cy="80" r="4" fill="#adb5bd"/>
</svg>



    <h4 class="text-center py-3">Admin Panel</h4>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="fas fa-home me-2"></i> Dashboard
    </a>
    <a href="{{ route('admin.create_exam') }}" class="{{ request()->is('admin/create-exam') ? 'active' : '' }}">
        <i class="fas fa-file-alt me-2"></i> Create Exam
    </a>
    <a href="{{ route('admin.results') }}" class="{{ request()->is('admin/results') ? 'active' : '' }}">
        <i class="fas fa-chart-line me-2"></i> View Results
    </a>
    <a href="{{ route('admin.applications') }}" class="{{ request()->is('admin/applications') ? 'active' : '' }}">
        <i class="fas fa-file-upload me-2"></i> Applications
    </a>
    <a href="{{ route('admin.students') }}" class="{{ request()->is('admin/students') ? 'active' : '' }}">
        <i class="fas fa-users-cog me-2"></i> Manage Students
    </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


 
    <div class="content">
        @yield('content')
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

