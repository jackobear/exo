<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moon extends Model
{
    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/moons/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/moon/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);
        return(array($output, $return_var));
    }
}
