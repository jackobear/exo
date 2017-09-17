<?php

namespace App\Http\Controllers;
use App\Planet;

use Request;

class PlanetController extends Controller
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
        $planet = \App\Planet::find($id);
        return view('planet.show', ['planet' => $planet]);
    }

    public function save_as_png($id)
    {
        $planet = \App\Planet::find($id);
        if(!is_numeric($id) || empty($planet)) return "Not found";
        echo "Saving " . $planet->name . "...<br>";
        $status = $planet->save_as_png();
        print_r($status);
        return "<br>Done<br>";
    }

    public function save_all_as_png(){
        $planets = \App\Planet::all();
        foreach($planets as $planet){
            echo "Saving " . $planet->name . "...<br>";
            $status = $planet->save_as_png();
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
        $planet = \App\Planet::findOrFail($id);
        return view('planet.edit', ['planet' => $planet]);
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
        $planet = \App\Planet::findOrFail($id);
        $input = Request::all();
        $planet->update($input);
        return redirect('planet/'.$id);
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
