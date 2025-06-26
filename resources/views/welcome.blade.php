<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind Config -->
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
            background-color: white;
        }

        .dark body {
            background: linear-gradient(135deg, #1e1e2f 0%, #2b2b45 100%);
        }
    </style>
</head>
<body class="min-h-screen font-sans antialiased text-black">

    <!-- Top Bar -->
    <div class="w-full bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-700">📢 Notice Board</h1>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Log in</a>
<a href="{{ route('register') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Register</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
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
