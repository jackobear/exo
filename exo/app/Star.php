<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class Star extends Model
{
    protected $fillable = ['name', 'type', 'body', 'satellites', 'artist_url'];
    public $timestamps = false;
    use SavableAsPng;
}
