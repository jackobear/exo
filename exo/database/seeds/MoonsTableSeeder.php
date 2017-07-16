<?php

use Illuminate\Database\Seeder;

class MoonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = database_path() . '/seeds/csv/moons.csv';
    
        $moons = csv_to_array($csvFile);
    
        DB::table('moons')->truncate();
        DB::table('moons')->insert($moons);

    }
}
