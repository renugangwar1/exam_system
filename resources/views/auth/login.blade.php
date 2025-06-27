<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        0% {
            transform: translateY(0) rotate(0deg) scale(1);
        }
        50% {
            transform: translateY(-15px) rotate(15deg) scale(1.05);
        }
        100% {
            transform: translateY(0) rotate(0deg) scale(1);
        }
    }

    .login-box {
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

    .login-box:hover {
        transform: scale(1.015);
    }

    @keyframes fadeInUp {
        from { transform: translateY(60px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .login-box h2 {
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


<div class="background-doodles">
    <!-- Circle -->
    <svg width="200" height="200"  style="top: 8%; left: 10%;" class="floating">
        <circle cx="70" cy="70" r="60" stroke="#fff" stroke-width="6" fill="none"/>
    </svg>

    <!-- Square -->
    <svg width="200" height="200" style="top: 55%; left: 65%;" class="floating delay-1">
        <rect x="10" y="10" width="100" height="100" stroke="#fff" stroke-width="5" fill="none"/>
    </svg>

    <!-- Triangle -->
    <svg width="200" height="200"  style="top: 38%; left: 38%;" class="floating delay-2">
        <polygon points="50,10 90,90 10,90" stroke="#fff" stroke-width="5" fill="none"/>
    </svg>

    <!-- Ellipse -->
    <svg width="200" height="200"  style="top: 25%; left: 80%;" class="floating delay-3">
        <ellipse cx="65" cy="65" rx="50" ry="30" stroke="#fff" stroke-width="4" fill="none"/>
    </svg>

    <!-- Curved Path -->
    <svg width="200" height="200" style="top: 72%; left: 20%;" class="floating delay-4">
        <path d="M10 90 Q 50 10, 90 90" stroke="#fff" stroke-width="4" fill="none"/>
    </svg>

    <!-- Cross -->
    <svg width="200" height="200"  style="top: 15%; left: 50%;" class="floating delay-5">
        <line x1="20" y1="20" x2="70" y2="70" stroke="#fff" stroke-width="4"/>
        <line x1="20" y1="70" x2="70" y2="20" stroke="#fff" stroke-width="4"/>
    </svg>

    <!-- Blob Shape -->
    <svg width="200" height="200"  style="top: 65%; left: 35%;" class="floating delay-6">
        <path d="M30,50 Q50,20 70,50 Q50,80 30,50 Z" stroke="#fff" stroke-width="3" fill="none"/>
    </svg>

    <!-- Spiral -->
    <svg width="200" height="200"  style="top: 40%; left: 15%;" class="floating delay-2">
        <path d="M50,50 m-25,0 a25,25 0 1,0 50,0 a25,25 0 1,0 -50,0" stroke="#fff" stroke-width="3" fill="none"/>
    </svg>

    <!-- Infinity Loop -->
    <svg width="400" height="400"  style="top: 20%; left: 60%;" class="floating delay-1">
        <path d="M20,60 C20,20 80,20 80,60 S140,100 140,60" stroke="#fff" stroke-width="3" fill="none"/>
    </svg>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 430"><path d="M172 167.4c3.9 3.6 10.9 2.8 13.2-2.1 2.1-6.7-8-19.7-10.2-27.3-12.4-27.2-25.1-54.3-38.2-81.2-4-9.2-20.1-4.1-15.8 5.9 17.7 34.5 32.5 70.8 51 104.7zm71.2 80.7c-7-9.5-21-.1-13.5 9.9 10 25.7 18.1 52 27.7 77.9 3.1 9.5 19.6 6.2 16.3-4.2-16.6-46.2-24.6-72.3-30.5-83.6zm-63.1-14.3c-6.4 3.5-7.6 12.5-11.5 18.3-12.7 25.4-26.2 50.3-39.6 75.3-2.1 3.9-.4 8.5 3.4 10.6 3.6 2 9.1 1.5 11.2-2.5 22-40.9 34.3-65.3 45.1-87.9 5.9-6.6.3-16.6-8.6-13.8zm54.7-70.1c16.8-38.6 32.2-65.9 57.6-113.4 4.9-8.8-9.6-16.5-14.5-8.1-20 38.1-40.7 76-56.7 115.9-3.5 8.1 10.3 13.7 13.6 5.6zm-78.5 31.1c-19.6-4.3-40-4-60-5.6-21.3-1.3-42.7-2.4-64-4.3-4.3-.4-8.7 2.5-9 7.1.8 14.1 25.9 8.4 35.8 10.8 30.7 2.2 61.7 2.1 92.3 5.8 9.8 3.4 14.6-10.6 4.9-13.8zm191.7-3.4c-24.6.8-49.2 1.7-73.7 3.4-6 1-12.8-.5-18.2 2.5-4.1 3.1-2.7 9.5 1.7 11.6 30.2 1.8 61.2-2.3 91.6-2.2 10.9-.3 8.6-16-1.4-15.3z" fill="#808"></path></svg> -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 450 450"><path d="M208 394.6C94.4 387 4 247 64 146.9c28-49 85.9-78 142-75 58.7 8.3 102.6 61.1 108 118.5 3.8 56-35.1 119.9-95.2 121.6-33 .4-68.7-23.3-83.7-51.7-22.6-38-10.7-92.3 31.8-108.3 31.6-12.2 74 9.1 82.4 42.8 9.4 34.7-36.8 61.7-63.6 42.4-29.8-32.3 19.2-58 46.8-36.3-5.2-31.5-51.9-49.7-74.5-24-53.7 53.9 31.8 152.9 95.6 107.4 40-27.8 54-87.8 33.2-129.3-19.6-42.7-60.2-74.1-107.1-66-67.6 9-123.4 68-117 138.7 7.7 86 98.2 173.8 188.2 145.9 43.9-12.2 78-43.3 100.9-79.2 36.3-70.9 47-153.2 23-229.2-1.5-4.5 1.8-8.8 6.1-9.9 4.4-1 9.4 1.1 10.9 5.6 23.7 75 15 152.6-16 224C350.5 345.5 274 400 208.2 394.6Zm10.7-170c2.5-1.4 4-2.2 7.1-5-.7-1.2-1-2.5-.9-3.8-7.5-8.5-24.7-11.3-30.6-.2-.8 3.6.7 6.8 3.6 10 5.4 4 16.8.2 20.8-1Z" fill="#808"></path></svg>
</div>



<div class="login-box">
    <h2> Login</h2>

    @if ($errors->any())
    <div class="error">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" id="email" placeholder=" " value="{{ old('email') }}" required>
            <label for="email">Email</label>
            <i class="fas fa-envelope"></i>
        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" placeholder=" " required>
            <label for="password">Password</label>
            <i class="fas fa-lock"></i>
        </div>

        <button type="submit" class="btn">
             Login Securely
        </button>
    </form>
    <div style="margin-top: 20px; text-align: center;">
    <span style="color: #555;">Don't have an account?</span>
    <a href="{{ route('register') }}" style="color: #6e8efb; font-weight: bold; text-decoration: none;">
        Register here
    </a>
</div>
</div>

</body>
</html>
