<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type',
        'reason',
        'date_from',
        'date_to',
        'status',
        'days_taken', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($leaveRequest) {
            // Calculate days_taken before saving
            $leaveRequest->days_taken = \Carbon\Carbon::parse($leaveRequest->date_from)
                                        ->diffInDays(\Carbon\Carbon::parse($leaveRequest->date_to)) + 1;
        });
    }

    // Accessor for dynamic calculation of days_taken
    public function getDaysTakenAttribute()
    {
        return $this->attributes['days_taken'] ?? 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

