<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moon extends Model
{
    protected $fillable = ['name', 'type', 'escape_velocity', 'body', 'sites', 'artist_url'];
    public $timestamps = false;

    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/moons/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/moon/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        $image = imagecreatefrompng($filename);
        if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
            imagepng($image, "/var/www/exo/public/img/print-cards/moons/" . str_replace(" ", "_", strtolower($this->name)) . ".png");
            imagedestroy($image);
        }

        return(array($output, $return_var));
    }
}
