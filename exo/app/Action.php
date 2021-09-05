<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
	protected $fillable = ['name', 'type', 'cost', 'body', 'quantity', 'artist_url'];
	public $timestamps = false;

    public function save_as_png(){
        $filename = "/var/www/exo/public/img/cards/actions/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=825,1125 http://192.168.33.10/action/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        $image = imagecreatefrompng($filename);
        if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
            imagepng($image, "/var/www/exo/public/img/print-cards/actions/" . str_replace(" ", "_", strtolower($this->name)) . ".png");
            imagedestroy($image);
        }

        return(array($output, $return_var));
    }

    public static function get_stats(){
        $stats = [];
        $actions = \App\Action::all();
        foreach($actions as $action){
            if ($action->cost){
                $costs = explode(",", $action->cost);
                foreach($costs as $cost){
                    $cost = trim($cost);
                    if(is_numeric($cost[0])){
                        $resource = substr($cost, 1);
                        if(array_key_exists($resource, $stats)){
                            $stats[$resource] += $cost[0] * $action->quantity;
                        } else {
                            $stats[$resource] = $cost[0] * $action->quantity;
                        }
                    }
                }
            }
        }
        return $stats;
    }
}
