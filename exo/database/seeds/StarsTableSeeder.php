<?php

use Illuminate\Database\Seeder;

class StarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/stars.csv';
    
        $stars = csv_to_array($csvFile);
    
        DB::table('stars')->truncate();
        DB::table('stars')->insert($stars);

    }
}
