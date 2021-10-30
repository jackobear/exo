<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Planet extends Model
{
    protected $fillable = ['name', 'type', 'escape_velocity', 'body', 'sites', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;

    public static function get_stats(){
        $stats = [];
        $planets = \App\Planet::all();
        $stats['count'] = $planets->count();
        foreach($planets as $planet){
            $sites = explode(",", $planet->sites);
            foreach($sites as $site){
                $site = trim($site);
                $bonuses = explode('+', $site);
                foreach($bonuses as $bonus){
                    if($bonus){
                        $multiplier = 1;
                        if(is_numeric($bonus[0])){
                            $resource = substr($bonus, 1);
                            $multiplier = $bonus[0];
                        } else {
                            $resource = $bonus;
                        }
                        if(array_key_exists($resource, $stats)){
                            $stats[$resource] += $multiplier;
                        } else {
                            $stats[$resource] = $multiplier;
                        }
                    }
                }
            }
        }
        return $stats;
    }

}
