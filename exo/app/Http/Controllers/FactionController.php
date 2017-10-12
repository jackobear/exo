<?php

namespace App\Http\Controllers;
use App\Faction;

use Request;

class FactionController extends Controller
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
        $faction = \App\Faction::find($id);
        $faction->body = $this->format_resources($faction->body);
        return view('faction.show', ['faction' => $faction]);
    }

    public function save_all_as_png(){
        $factions = \App\Faction::all();
        foreach($factions as $faction){
            echo "Saving " . $faction->name . "...<br>";
            $status = $faction->save_as_png();
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
        $faction = \App\Faction::findOrFail($id);
        return view('faction.edit', ['faction' => $faction]);
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
        $faction = \App\Faction::findOrFail($id);
        $input = Request::all();
        $faction->update($input);
        return redirect('faction/'.$id);
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
