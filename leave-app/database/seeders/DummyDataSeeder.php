<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        
        // Create admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create employees
        User::factory()->count(3)->create()->each(function ($user) {
            // Assign 'user' role if not default
            $user->role = 'user';
            $user->save();

            // Create leave requests
            LeaveRequest::create([
                'user_id' => $user->id,
                'leave_type' => 'Medical',
                'reason' => 'Fever and rest needed',
                'date_from' => now()->addDays(rand(1, 10))->toDateString(),
                'date_to' => now()->addDays(rand(11, 15))->toDateString(),
                'status' => 'pending',
            ]);
        });
    }
}
$this->call(DummyDataSeeder::class);