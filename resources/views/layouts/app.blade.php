<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
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
    </style>
</head>
<body>

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

    <!-- Sidebar -->
   <div class="sidebar position-relative">
    <!-- 🎨 Doodle Background -->
 <div class="sidebar-doodles position-absolute w-100 h-100 top-0 start-0 overflow-hidden">
    <svg width="100%" height="100%" viewBox="0 0 300 800" preserveAspectRatio="none">
        <g fill="none" stroke="#8ab4f8" stroke-width="1.2" opacity="0.5">
            <!-- 🌀 Swirls -->
           
            <circle cx="200" cy="180" r="30"/>
            <!-- ✨ Stars -->
            <polygon points="50,20 60,40 80,45 65,60 70,80 50,70 30,80 35,60 20,45 40,40" />
            <polygon points="180,300 185,310 195,312 188,320 190,330 180,325 170,330 172,320 165,312 175,310" />
            <!-- 💠 Zig-Zag -->
            <polyline points="20,500 40,520 60,500 80,520 100,500" />
            <!-- 🔹 Diamond -->
            <polygon points="100,700 120,720 100,740 80,720"/>
        </g>
    </svg>
</div>


        
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

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
