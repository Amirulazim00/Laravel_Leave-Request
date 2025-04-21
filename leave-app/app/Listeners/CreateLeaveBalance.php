<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\LeaveBalance;

class CreateLeaveBalance
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        LeaveBalance::firstOrCreate([
            'user_id' => $event->user->id,
        ], [
            'annual_leave' => 14,
            'medical_leave' => 10,
            'emergency_leave' => 0,
        ]);
    }
}
