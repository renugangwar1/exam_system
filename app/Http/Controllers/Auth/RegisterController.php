<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // 🔁 Generate unique roll number
        $roll_no = $this->generateRollNo();

        // ✅ Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'student',
            'password' => Hash::make($request->password),
            'roll_no' => $roll_no,
        ]);

        Auth::login($user);

        return redirect('/student/dashboard');
    }

    protected function generateRollNo()
    {
        $prefix = '25'; // Optional: Customize as needed
        $lastUser = User::orderBy('id', 'desc')->first();
        $lastId = $lastUser ? $lastUser->id : 0;
        $nextId = $lastId + 1;

        return $prefix . str_pad($nextId, 8, '0', STR_PAD_LEFT); // Example: RN00001
    }
}

