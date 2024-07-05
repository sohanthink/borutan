<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(AreaSeeder::class);
        \App\Models\User::factory(5)->create();
        \App\Models\Contact::factory(10)->create();

    }
}
