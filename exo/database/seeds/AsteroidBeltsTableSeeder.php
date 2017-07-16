<?php

use Illuminate\Database\Seeder;

class AsteroidBeltsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $csvFile = database_path() . '/seeds/csv/asteroid_belts.csv';
    
        $asteroid_belts = csv_to_array($csvFile);
    
        DB::table('asteroid_belts')->truncate();
        DB::table('asteroid_belts')->insert($asteroid_belts);

    }
}
