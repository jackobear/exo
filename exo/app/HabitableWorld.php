<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class HabitableWorld extends Model
{
    protected $fillable = ['name', 'type', 'escape_velocity', 'body', 'satellites', 'sites', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;

}
