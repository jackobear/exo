<?php

use Illuminate\Database\Seeder;

class DwarfPlanetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/dwarf_planets.csv';
    
        $dwarf_planets = csv_to_array($csvFile);
    
        DB::table('dwarf_planets')->truncate();
        DB::table('dwarf_planets')->insert($dwarf_planets);

    }
}
