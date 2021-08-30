<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    protected $fillable = ['name', 'body', 'flavor_text', 'planetship_cost', 'starship_cost', 'travel_time', 'colonize_time', 'artist_url'];
    public $timestamps = false;
    
    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/factions/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=1725,1125 http://192.168.33.10/faction/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        $image = imagecreatefrompng($filename);
        //$image = imagerotate($image, 90, 0);
        if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
            imagepng($image, "/var/www/exo/public/img/print-cards/factions/" . str_replace(" ", "_", strtolower($this->name)) . ".png");
            imagedestroy($image);
        }

        return(array($output, $return_var));
    }
}
