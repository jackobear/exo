<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DwarfPlanet extends Model
{
    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/dwarf-planets/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/dwarf-planet/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        $image = imagecreatefrompng($filename);
        if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
            imagepng($image, "/var/www/exo/public/img/print-cards/dwarf-planets/" . str_replace(" ", "_", strtolower($this->name)) . ".png");
            imagedestroy($image);
        }

        return(array($output, $return_var));
    }
}
