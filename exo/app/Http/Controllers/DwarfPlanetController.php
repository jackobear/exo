<?php

namespace App\Http\Controllers;
use App\DwarfPlanet;

use Request;

class DwarfPlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dwarf_planets = \App\DwarfPlanet::orderBy('name')->get();
        return view('dwarf_planet.index', ['dwarf_planets' => $dwarf_planets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dwarf_planet.create');
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
        $dwarf_planet = DwarfPlanet::create($input);
        $dwarf_planet->save();
        return redirect("/dwarf-planet");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dwarf_planet = \App\DwarfPlanet::find($id);
        return view('dwarf_planet.show', ['dwarf_planet' => $dwarf_planet]);
    }

    public function save_all_as_png(){
        $dwarf_planets = \App\DwarfPlanet::all();
        foreach($dwarf_planets as $dwarf_planet){
            echo "Saving " . $dwarf_planet->name . "...<br>";
            $status = $dwarf_planet->save_as_png();
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
        $dwarf_planet = \App\DwarfPlanet::findOrFail($id);
        return view('dwarf_planet.edit', ['dwarf_planet' => $dwarf_planet]);
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
        $dwarf_planet = \App\DwarfPlanet::findOrFail($id);
        $input = Request::all();
        $dwarf_planet->update($input);
        return redirect('dwarf-planet/'.$id);
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
