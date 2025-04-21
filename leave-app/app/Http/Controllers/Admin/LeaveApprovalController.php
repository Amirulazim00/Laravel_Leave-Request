<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeaveBalance;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::where('status', 'pending')->latest()->get();
        return view('admin.leaves.index', compact('leaves'));
    }

    public function approve($id)
{
    $leave = LeaveRequest::findOrFail($id);

    // Prevent re-approving an already approved leave
    if ($leave->status === 'approved') {
        return back()->with('info', 'This leave is already approved.');
    }

    // Get leave balance
    $balance = $leave->user->leaveBalance;

    if (!$balance) {
        return back()->with('error', 'Leave balance not found for user.');
    }

    $daysTaken = $leave->days_taken;

    // Deduct leave days based on leave type
    switch ($leave->leave_type) {
        case 'Annual':
            if ($balance->annual_leave >= $daysTaken) {
                $balance->annual_leave -= $daysTaken;
            } else {
                return back()->with('error', 'Insufficient annual leave.');
            }
            break;
    
        case 'Medical':
            if ($balance->medical_leave >= $daysTaken) {
                $balance->medical_leave -= $daysTaken;
            } else {
                return back()->with('error', 'Insufficient medical leave.');
            }
            break;
    
        case 'Emergency':
            $balance->emergency_leave += 1; // Track how many times it was used
            break;
    
        default:
            return back()->with('error', 'Invalid leave type.');
    }

    // Save both leave and balance
    $leave->status = 'approved';
    $leave->save();
    $balance->save();

    return back()->with('success', 'Leave approved and balance updated.');
}

   
     
    public function reject($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        return back()->with('success', 'Leave rejected');
    }




}
