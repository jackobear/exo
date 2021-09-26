<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SavableAsPng;

class ReferenceCard extends Model
{
    protected $fillable = ['name', 'type', 'quantity'];
    public $timestamps = false;
    use SavableAsPng;

}
