<?php

use Illuminate\Database\Seeder;

class AsteroidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/asteroids.csv';
    
        $asteroids = csv_to_array($csvFile);
    
        DB::table('asteroids')->truncate();
        DB::table('asteroids')->insert($asteroids);

    }
}
