<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Faction extends Model
{
    protected $fillable = ['name', 'body', 'flavor_text', 'planetship_cost', 'starship_cost', 'travel_time', 'colonize_time', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;
}
