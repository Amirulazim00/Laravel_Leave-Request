<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'employee_id',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
   
    public function leaveBalance()
    {
        return $this->hasOne(LeaveBalance::class);
    }

    public function getAuthIdentifierName()
    {
        return 'employee_id'; // This tells Laravel to use employee_id for login
    }
    
    public function getAuthIdentifier()
    {
        return $this->employee_id; // This tells Laravel to use employee_id for login
    }

    public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class, 'user_id'); // or 'employee_id' if foreign key is named that
}
}
