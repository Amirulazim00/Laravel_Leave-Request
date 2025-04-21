<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index()
    {
        // Fetch leave requests for the authenticated user using user_id
        $leaves = LeaveRequest::where('user_id', Auth::user()->id)->latest()->get();

        return view('leave.index', compact('leaves'));
    }



    public function create()
    {
        return view('leave.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'leave_type' => 'required',
            'reason' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        // Get the authenticated user's ID (auth_id)
        $user = Auth::user();  // This will give you the authenticated user's record

        // Store the leave request using user_id only (no need for employee_id)
        LeaveRequest::create([
            'user_id' => $user->id,  // Save the user ID in leave_requests
            'leave_type' => $request->leave_type,
            'reason' => $request->reason,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'status' => 'pending',
        ]);

        return redirect()->route('leave.index')->with('success', 'Leave request submitted!');
    }
}

