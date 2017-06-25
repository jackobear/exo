<?php

namespace App\Http\Controllers;
use App\Star;

use Illuminate\Http\Request;

class ReferenceCardController extends Controller
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
        switch($id){
            case 1:
                return view('reference_card.turn_sequence');
            case 2:
                return view('reference_card.space_market');
            case 3:
                return view('reference_card.victory_points');
            case 4:
                return view('reference_card.scoring_track');
            case 5:
                return view('reference_card.board_layout');
            default:
                return "Reference Card not found.";
        }
    }

    public function save_all_as_png(){
        $card_count = 5;
        for($i=1;$i<=$card_count;$i++){
            echo "<br>Saving a reference card...<br>";
            $filename = "/var/www/exo/public/img/cards/reference-cards/" . $i . ".png";
            $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=1725,1125 http://192.168.33.10/reference-card/" . $i;
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
