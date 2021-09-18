<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Action extends Model
{
	protected $fillable = ['name', 'type', 'cost', 'body', 'quantity', 'artist_url', 'flavor_text'];
	public $timestamps = false;
    use SavableAsPng;

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
