<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    // Save as PNG
    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/planets/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/planet/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);
        return(array($output, $return_var));
    }
}
