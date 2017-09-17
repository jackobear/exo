<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitableWorld extends Model
{
    protected $fillable = ['name', 'type', 'escape_velocity', 'body', 'sites', 'artist_url'];
    public $timestamps = false;

    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/habitable-worlds/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/habitable-world/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);
        return(array($output, $return_var));
    }
}
