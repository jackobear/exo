<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class DatabaseController extends Controller
{
    /**
     * Show the view for the given card.
     *
     * @param  int  $id
     * @return Response
     */
    public function export()
    {
        exec("mysqldump -u root -p'root' scotchbox > /var/www/exo.sql");
        return view('welcome');
    }
}