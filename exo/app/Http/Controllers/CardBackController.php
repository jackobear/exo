<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('card_back.show', ['id'=>$id]);
    }

    public function save_all_as_png(){
        $card_count = 9;
        for($i=1;$i<=$card_count;$i++){
            echo "<br>Saving a card back...<br>";
            $filename = "/var/www/exo/public/img/cards/card-backs/" . $i . ".png";
            $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=1725,1125 http://192.168.33.10/card-backs/" . $i;
            $output = "";
            $return_var = 0;
            exec(escapeshellcmd($cmd), $output, $return_var);
            print_r($output);
            print_r($return_var);
        }
        return "<br>Done<br>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
