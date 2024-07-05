<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'Admin',
            'status' => 'Approved',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
        ]);
     
        User::factory()->count(5)->create([
            'role' => 'User',
            'status' => 'Approved',
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
