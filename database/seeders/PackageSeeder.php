<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Prio',
            'contract' => 1,
            'price' => 349,
            'status' => 'Active',
        ]);
        Package::create([
            'name' => 'Bas',
            'contract' => 2,
            'price' => 299,
            'status' => 'Active',
        ]);
    }
}