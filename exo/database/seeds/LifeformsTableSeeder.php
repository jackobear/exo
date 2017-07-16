<?php

use Illuminate\Database\Seeder;

class LifeformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/lifeforms.csv';
    
        $lifeforms = csv_to_array($csvFile);
    
        DB::table('lifeforms')->truncate();
        DB::table('lifeforms')->insert($lifeforms);

    }
}
