<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Use employee_id instead of email
        $credentials = $request->only('employee_id', 'password');

        // Check if user exists with provided employee_id
        $user = User::where('employee_id', $credentials['employee_id'])->first();

        // Validate if the user exists and is an admin
        if ($user && Auth::attempt(['employee_id' => $credentials['employee_id'], 'password' => $credentials['password']])) {
            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors(['employee_id' => 'Unauthorized. You are not an admin.']);
            }

            return redirect()->route('admin.dashboard');
        }

        // If credentials are invalid
        return back()->withErrors(['employee_id' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
