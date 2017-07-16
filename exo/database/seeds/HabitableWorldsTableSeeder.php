<?php

use Illuminate\Database\Seeder;

class HabitableWorldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/habitable_worlds.csv';
    
        $habitable_worlds = csv_to_array($csvFile);
    
        DB::table('habitable_worlds')->truncate();
        DB::table('habitable_worlds')->insert($habitable_worlds);

    }
}
