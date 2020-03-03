<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenceCardController extends Controller
{

    private $cards = [
        "turn_sequence",
        "space_market",
        "victory_points",
        "scoring_track",
        "board_layout",
        "one_coin",
        "five_coin",
        "quick_setup",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reference_card.index', ['cards' => $this->cards]);
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
        return view('reference_card.' . $this->cards[$id]);
    }

    public function save_all_as_png(){
        for($i=0;$i<count($this->cards);$i++){
            echo "<br>Saving reference cards...<br>";
            $filename = "/var/www/exo/public/img/cards/reference-cards/" . $this->cards[$i] . ".png";
            $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size=";
            if($this->cards[$i] == "one_coin"){
                $cmd .= "225,225";
            }else if($this->cards[$i] == "five_coin"){
                $cmd .= "300x300";
            }else{
                $cmd .= "1725,1125";
            }
            $cmd .= " http://192.168.33.10/reference-card/" . $i;
            $output = "";
            $return_var = 0;
            exec(escapeshellcmd($cmd), $output, $return_var);
            print_r($output);
            print_r($return_var);

            $image = imagecreatefrompng($filename);
            if(strpos($this->cards[$i], 'coin') !== false){
                // no rotation needed for coins
            }else{
                $image = imagerotate($image, 90, 0);
            }
            if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
                imagepng($image, "/var/www/exo/public/img/print-cards/reference-cards/" . $this->cards[$i] . ".png");
                imagedestroy($image);
            }
    
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
