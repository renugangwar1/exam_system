<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notice Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <script src="https://cdn.tailwindcss.com"></script>

   
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        };
    </script>

    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            position: relative;
            min-height: 100vh;
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
    </style>
</head>
<body class="text-black relative">

   
    <div class="background-doodles">
        <svg width="200" height="200" style="top: 8%; left: 10%;" class="delay-1"><circle cx="70" cy="70" r="60" stroke="#fff" stroke-width="6" fill="none"/></svg>
        <svg width="200" height="200" style="top: 55%; left: 65%;" class="delay-2"><rect x="10" y="10" width="100" height="100" stroke="#fff" stroke-width="5" fill="none"/></svg>
        <svg width="200" height="200" style="top: 38%; left: 38%;" class="delay-3"><polygon points="50,10 90,90 10,90" stroke="#fff" stroke-width="5" fill="none"/></svg>
        <svg width="200" height="200" style="top: 25%; left: 80%;" class="delay-4"><ellipse cx="65" cy="65" rx="50" ry="30" stroke="#fff" stroke-width="4" fill="none"/></svg>
        <svg width="200" height="200" style="top: 72%; left: 20%;" class="delay-5"><path d="M10 90 Q 50 10, 90 90" stroke="#fff" stroke-width="4" fill="none"/></svg>
        <svg width="200" height="200" style="top: 15%; left: 50%;" class="delay-6">
            
            <line x1="20" y1="20" x2="70" y2="70" stroke="#fff" stroke-width="4"/>
            <line x1="20" y1="70" x2="70" y2="20" stroke="#fff" stroke-width="4"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 450 450"><path d="M208 394.6C94.4 387 4 247 64 146.9c28-49 85.9-78 142-75 58.7 8.3 102.6 61.1 108 118.5 3.8 56-35.1 119.9-95.2 121.6-33 .4-68.7-23.3-83.7-51.7-22.6-38-10.7-92.3 31.8-108.3 31.6-12.2 74 9.1 82.4 42.8 9.4 34.7-36.8 61.7-63.6 42.4-29.8-32.3 19.2-58 46.8-36.3-5.2-31.5-51.9-49.7-74.5-24-53.7 53.9 31.8 152.9 95.6 107.4 40-27.8 54-87.8 33.2-129.3-19.6-42.7-60.2-74.1-107.1-66-67.6 9-123.4 68-117 138.7 7.7 86 98.2 173.8 188.2 145.9 43.9-12.2 78-43.3 100.9-79.2 36.3-70.9 47-153.2 23-229.2-1.5-4.5 1.8-8.8 6.1-9.9 4.4-1 9.4 1.1 10.9 5.6 23.7 75 15 152.6-16 224C350.5 345.5 274 400 208.2 394.6Zm10.7-170c2.5-1.4 4-2.2 7.1-5-.7-1.2-1-2.5-.9-3.8-7.5-8.5-24.7-11.3-30.6-.2-.8 3.6.7 6.8 3.6 10 5.4 4 16.8.2 20.8-1Z" fill="#808"></path></svg>

    </div>

   
    <div class="w-full bg-white shadow-md relative z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-700">📢 Notice Board</h1>
        
        <div class="flex items-center space-x-4">
          
            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition">
               
                <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 10a1 1 0 011-1h8.586l-2.293-2.293a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H4a1 1 0 01-1-1z"/>
                </svg>
                Log in
            </a>

           
            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg shadow-md transition">
               
                <svg class="w-4 h-4 mr-2 fill-current text-blue-700" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 14v1a3 3 0 003 3h1a3 3 0 003-3v-1h-7zm-4-3a4 4 0 100-8 4 4 0 000 8zM4 6h8v2H4V6zm0 4h8v2H4v-2zm0 4h5v2H4v-2z"/>
                </svg>
                Register
            </a>
        </div>
    </div>
</div>


   
    <div class="flex flex-col items-center justify-center py-16 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="w-full max-w-3xl bg-white shadow-2xl rounded-2xl p-8 border border-gray-200">
            <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-8">Latest Announcements</h2>
            <ul class="space-y-6 text-gray-800">
                <li class="bg-gray-100 border-l-4 border-indigo-500 p-5 rounded-lg shadow-sm transition hover:scale-[1.01]">
                    <strong class="text-indigo-700">📌 Exam Portal Opens:</strong>
                    <p class="mt-1 text-sm">The online exam portal will be open from <em>June 30</em> to <em>July 5</em>.</p>
                </li>
                <li class="bg-gray-100 border-l-4 border-green-500 p-5 rounded-lg shadow-sm transition hover:scale-[1.01]">
                    <strong class="text-green-700">📚 New Syllabus Added:</strong>
                    <p class="mt-1 text-sm">Updated syllabus for Semester 2 is now available in your dashboard.</p>
                </li>
                <li class="bg-gray-100 border-l-4 border-yellow-500 p-5 rounded-lg shadow-sm transition hover:scale-[1.01]">
                    <strong class="text-yellow-700">⏰ Maintenance Notice:</strong>
                    <p class="mt-1 text-sm">System will be under maintenance on <em>July 2</em> from <em>2 AM – 4 AM</em>.</p>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>
