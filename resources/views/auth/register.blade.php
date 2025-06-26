<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        .background-doodles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .background-doodles svg {
            position: absolute;
            opacity: 0.08;
            animation: floatRotate 6s infinite ease-in-out alternate;
        }

        .delay-1 { animation-delay: 1s; animation-duration: 5.5s; }
        .delay-2 { animation-delay: 2s; animation-duration: 5.8s; }
        .delay-3 { animation-delay: 3s; animation-duration: 6s; }
        .delay-4 { animation-delay: 4s; animation-duration: 6.3s; }
        .delay-5 { animation-delay: 5s; animation-duration: 5.6s; }
        .delay-6 { animation-delay: 6s; animation-duration: 6.2s; }

        @keyframes floatRotate {
            0% { transform: translateY(0) rotate(0deg) scale(1); }
            50% { transform: translateY(-15px) rotate(15deg) scale(1.05); }
            100% { transform: translateY(0) rotate(0deg) scale(1); }
        }

        .register-box {
            background: #ffffff;
            padding: 45px 35px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            z-index: 10;
            animation: fadeInUp 0.8s ease-out;
            transition: all 0.3s ease-in-out;
        }

        .register-box:hover {
            transform: scale(1.015);
        }

        @keyframes fadeInUp {
            from { transform: translateY(60px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .register-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group input {
            width: 85%;
            padding: 14px 40px 14px 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: transparent;
            font-size: 1rem;
        }

        .form-group label {
            position: absolute;
            top: 14px;
            left: 14px;
            background: #fff;
            padding: 0 5px;
            color: #888;
            font-size: 0.95rem;
            transition: 0.3s;
            pointer-events: none;
        }

        .form-group input:focus,
        .form-group input:not(:placeholder-shown) {
            border-color: #6e8efb;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -8px;
            left: 10px;
            font-size: 0.75rem;
            color: #6e8efb;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1.1rem;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(110, 142, 251, 0.4);
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transform: skewX(-20deg);
            transition: all 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            background: linear-gradient(135deg, #5e7cf7, #9768ea);
            box-shadow: 0 6px 16px rgba(110, 142, 251, 0.6);
        }

        .error {
            background: #ffe2e2;
            color: #c00;
            border: 1px solid #f5c2c2;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- SVG Background Doodles -->
<div class="background-doodles">
    <svg width="200" height="200" style="top: 8%; left: 10%;" class="delay-1"><circle cx="70" cy="70" r="60" stroke="#fff" stroke-width="6" fill="none"/></svg>
    <svg width="200" height="200" style="top: 55%; left: 65%;" class="delay-2"><rect x="10" y="10" width="100" height="100" stroke="#fff" stroke-width="5" fill="none"/></svg>
    <svg width="200" height="200" style="top: 38%; left: 38%;" class="delay-3"><polygon points="50,10 90,90 10,90" stroke="#fff" stroke-width="5" fill="none"/></svg>
    <svg width="200" height="200" style="top: 25%; left: 80%;" class="delay-4"><ellipse cx="65" cy="65" rx="50" ry="30" stroke="#fff" stroke-width="4" fill="none"/></svg>
    <svg width="200" height="200" style="top: 72%; left: 20%;" class="delay-5"><path d="M10 90 Q 50 10, 90 90" stroke="#fff" stroke-width="4" fill="none"/></svg>
    <svg width="200" height="200" style="top: 15%; left: 50%;" class="delay-6"><line x1="20" y1="20" x2="70" y2="70" stroke="#fff" stroke-width="4"/><line x1="20" y1="70" x2="70" y2="20" stroke="#fff" stroke-width="4"/></svg>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220 320"><g fill="#808"><path d="M103.5 151.7c-33.2-4.9-45.2-44.9-25-69.6 8.9-10.4 25-19.8 39.2-15.3 24.6 5.9 37.2 34.8 28.6 56.9-6.7 17.3-24.1 30.8-42.8 28zm5.5-15.5c32.2 0 32.6-55.9-.6-54.6-30.2 1.2-31.6 54.6.6 54.6z"></path><path d="M58.4 38.5c55.8-40 132-10.3 136 61 1.2 22-4.7 50.5-19.6 67.7-17.7 20.5-42 31.3-68.9 32.2-17.7.6-36.9-7.2-50.6-18.4-32.5-26.4-37.9-80.2-19.2-115.9C41.5 55 49 45.2 58.4 38.5zm-9 40.5c-18 33.1-3.2 88.3 37.1 99.3 19.5 5.3 43.3 2.2 59.7-10 21.3-15.8 32.3-45.5 29.3-71.2-1.3-11.5-3.4-24-11-32.7C123.2 16.8 71.2 38.8 49.4 79z"></path></g></svg>

</div>

<!-- Registration Form -->
<div class="register-box">
    <h2> Student Registration</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input name="name" placeholder=" " value="{{ old('name') }}" required>
            <label for="name">Full Name</label>
            <i class="fas fa-user"></i>
        </div>

        <div class="form-group">
            <input name="email" type="email" placeholder=" " value="{{ old('email') }}" required>
            <label for="email">Email Address</label>
            <i class="fas fa-envelope"></i>
        </div>

        <div class="form-group">
            <input name="password" type="password" placeholder=" " required>
            <label for="password">Password</label>
            <i class="fas fa-lock"></i>
        </div>

        <div class="form-group">
            <input name="password_confirmation" type="password" placeholder=" " required>
            <label for="password_confirmation">Confirm Password</label>
            <i class="fas fa-lock"></i>
        </div>

        <button type="submit" class="btn"> Register Now</button>
    </form>
</div>

</body>
</html>
