<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('/welcome');  // Redirect to the dashboard by default
});

// Dashboard route
Route::get('/dashboard', function () {
    $user = Auth::user();
    $balance = $user->leaveBalance; 
    return view('dashboard', compact('user', 'balance'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Leave routes
    Route::get('/leave/apply', [LeaveRequestController::class, 'create'])->name('leave.create');
    Route::post('/leave/apply', [LeaveRequestController::class, 'store'])->name('leave.store');
    Route::get('/leave/history', [LeaveRequestController::class, 'index'])->name('leave.index');
});

// Include authentication routes (you can also remove this line if it's already in your auth.php file)
require __DIR__.'/auth.php';

// Include admin routes (if you have an admin.php for the admin dashboard)
require __DIR__.'/admin.php';


