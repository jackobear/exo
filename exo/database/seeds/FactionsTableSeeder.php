<?php

use Illuminate\Database\Seeder;

class FactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $csvFile = database_path() . '/seeds/csv/factions.csv';
    
        $factions = csv_to_array($csvFile);
    
        DB::table('factions')->truncate();
        DB::table('factions')->insert($factions);

    }
}
