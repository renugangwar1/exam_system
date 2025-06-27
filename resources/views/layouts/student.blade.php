<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Panel</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .nav-link.active {
            font-weight: bold;
            color: #0d6efd !important;
        }

        .btn-logout {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #dc3545;
            color: white;
            transform: scale(1.05);
        }

        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
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

        main {
            min-height: 80vh;
        }
    </style>
</head>
<body class="fade-in">

@auth
    @if(Auth::user()->role === 'student')
     
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="#">
                    <i class="fas fa-user-graduate me-2"></i>Student Panel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('student/dashboard') ? 'active' : '' }}"
                               href="{{ route('student.dashboard') }}">
                                <i class="fas fa-home me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('student/results') ? 'active' : '' }}"
                               href="{{ route('student.results') }}">
                                <i class="fas fa-poll me-1"></i> View Results
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}"
                                  onsubmit="return confirm('Are you sure you want to logout?');">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger ms-3 btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

     
        <main class="py-4 fade-in">
            @yield('content')
        </main>

     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @else
       
        <div class="container mt-5 fade-in">
            <div class="alert alert-danger text-center shadow-sm">
                <i class="fas fa-ban me-2"></i> Access Denied. This section is for Students only.
            </div>
        </div>
    @endif
@else
  
    <div class="container mt-5 fade-in">
        <div class="alert alert-warning text-center shadow-sm">
            <i class="fas fa-lock me-2"></i> Please <a href="{{ route('login') }}">login</a> to access the Student Panel.
        </div>
    </div>
@endauth

</body>
</html>
