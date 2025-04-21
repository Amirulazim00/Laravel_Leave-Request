<?php

use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LeaveApprovalController;
use App\Http\Controllers\Admin\LeaveBalanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    // Admin Auth Routes
    Route::get('login', [AdminLogin::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLogin::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminLogin::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware(['auth', 'is_admin'])->group(function () {

        // Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Leave Requests
        Route::get('leave-requests', [LeaveApprovalController::class, 'index'])->name('admin.leave.index');
        Route::post('leave-requests/{id}/approve', [LeaveApprovalController::class, 'approve'])->name('admin.leave.approve');
        Route::post('leave-requests/{id}/reject', [LeaveApprovalController::class, 'reject'])->name('admin.leave.reject');

        
    });

});
