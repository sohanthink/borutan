<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();

        $countries = array(
            array('name' => 'Stockholm'),
            array('name' => 'Göteborg'),
            array('name' => 'Malmö'),
            array('name' => 'Uppsala'),
            array('name' => 'Västerås'),
            array('name' => 'Örebro'),
            array('name' => 'Linköping'),
            array('name' => 'Helsingborg'),
            array('name' => 'Jönköping'),
            array('name' => 'Norrköping'),
            array('name' => 'Lund'),
            array('name' => 'Umeå'),
            array('name' => 'Gävle'),
            array('name' => 'Borås'),
            array('name' => 'Eskilstuna'),
            array('name' => 'Södertälje'),
            array('name' => 'Karlstad'),
            array('name' => 'Täby'),
            array('name' => 'Växjö'),
            array('name' => 'Halmstad'),
            array('name' => 'Sundsvall'),
            array('name' => 'Luleå'),
            array('name' => 'Trollhättan'),
            array('name' => 'Lidingö'),
            array('name' => 'Skellefteå '),
        );

        DB::table('areas')->insert($countries);
    }
}
