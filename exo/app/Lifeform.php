<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Lifeform extends Model
{
    protected $fillable = ['name', 'type', 'body', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;

}
