<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $csvFile = database_path() . '/seeds/csv/actions.csv';
    
        $actions = csv_to_array($csvFile);
    
        DB::table('actions')->truncate();
        DB::table('actions')->insert($actions);

    }
}
