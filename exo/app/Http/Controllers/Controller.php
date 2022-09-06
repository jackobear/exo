<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Given a string, format the resource codes into html for inline resource icons
    // TODO: Move into a view component/helper/js? or something similar
    public function format_resources($text){
        $text = preg_replace('/(\d)Fo/', "<span class='fa-stack fa-lg'><i class='exo-food fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)Fu/', "<span class='fa-stack fa-lg'><i class='exo-fuel fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)F/', "<span class='fa-stack fa-lg'><i class='exo-food fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)W/', "<span class='fa-stack fa-lg'><i class='exo-water fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)M/', "<span class='fa-stack fa-lg'><i class='exo-metal fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)C/', "<span class='fa-stack fa-lg'><i class='exo-coin fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        $text = preg_replace('/(\d)VP/', "<span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>$1</i></span>", $text);
        return $text;
    }
}
