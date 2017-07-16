<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function csv_to_array($filename='', $delimiter=','){
            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;
         
            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }
    
        /****************************************
        * CSV FILE SAMPLE *
        ****************************************/
        // id,subdireccion_id,idInterno,area,deleted_at,created_at,updated_at
        // ,1,4,AREA MALAGA OCC.,,2013/10/13 10:27:52,2013/10/13 10:27:52
        // ,1,2,AREA MALAGA N/ORIENT,,2013/10/13 10:27:52,2013/10/13 10:27:52

        $this->call(ActionsTableSeeder::class);
        $this->call(AsteroidBeltsTableSeeder::class);
        $this->call(AsteroidsTableSeeder::class);
        $this->call(DwarfPlanetsTableSeeder::class);
        $this->call(FactionsTableSeeder::class);
        $this->call(HabitableWorldsTableSeeder::class);
        $this->call(LifeformsTableSeeder::class);
        $this->call(MoonsTableSeeder::class);
        $this->call(PlanetsTableSeeder::class);
        $this->call(StarsTableSeeder::class);
    }
}
