<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Given a string, format the resource codes in html
    public function format_resources($text){
        $text = preg_replace('/(\d)Fo/', "<span class='food'>$1</span>", $text);
        $text = preg_replace('/(\d)Fu/', "<span class='fuel'>$1</span>", $text);
        $text = preg_replace('/(\d)F/', "<span class='food'>$1</span>", $text);
        $text = preg_replace('/(\d)W/', "<span class='water'>$1</span>", $text);
        $text = preg_replace('/(\d)M/', "<span class='metal'>$1</span>", $text);
        $text = preg_replace('/(\d)C/', "<span class='coin'>$1</span>", $text);
        return $text;
    }
}
