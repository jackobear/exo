<?php

namespace App\Http\Controllers;
use App\ReferenceCard;
use Request;

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
        $reference_cards = \App\ReferenceCard::orderBy('name')->get();
        return view('reference_card.index', ['reference_cards' => $reference_cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reference_card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::all();
        $reference_card = ReferenceCard::create($input);
        $reference_card->save();
        return redirect("/reference-card");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reference_card = \App\ReferenceCard::find($id);
        return view('reference_card.' . str_replace(' ', '_', strtolower($reference_card->name)));
    }

    public function save_all_as_png(){

        $reference_cards = \App\ReferenceCard::all();
        foreach($reference_cards as $reference_card){
            echo "Saving " . $reference_card->name . "...<br>";
            $status = $reference_card->save_as_png($reference_card->type);
            print_r($status);
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
        $reference_card = \App\ReferenceCard::findOrFail($id);
        return view('reference_card.edit', ['reference_card' => $reference_card]);
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
        $reference_card = \App\ReferenceCard::findOrFail($id);
        $input = Request::all();
        $reference_card->update($input);
        return redirect('reference-card/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReferenceCard::destroy($id);
        return redirect('reference-card');
    }
}
