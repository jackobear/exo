<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    /**
     * Show the view for the given card.
     *
     * @param  int  $id
     * @return Response
     */
    public function view()
    {
        return view('card.view');
    }
}