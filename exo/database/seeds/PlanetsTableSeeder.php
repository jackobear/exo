<?php

use Illuminate\Database\Seeder;

class PlanetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/planets.csv';
    
        $planets = csv_to_array($csvFile);
    
        DB::table('planets')->truncate();
        DB::table('planets')->insert($planets);

    }
}
