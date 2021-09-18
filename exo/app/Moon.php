<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Moon extends Model
{
    protected $fillable = ['name', 'type', 'escape_velocity', 'body', 'sites', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;

