<?php

namespace App\Http\Controllers;
use App\Moon;

use Request;

class MoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moons = \App\Moon::orderBy('name')->get();
        return view('moon.index', ['moons' => $moons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moon.create');
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
        $moon = Moon::create($input);
        $moon->save();
        return redirect("/moon");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moon = \App\Moon::find($id);
        return view('moon.show', ['moon' => $moon]);
    }

    public function save_all_as_png(){
        $moons = \App\Moon::all();
        foreach($moons as $moon){
            echo "Saving " . $moon->name . "...<br>";
            $status = $moon->save_as_png();
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
        $moon = \App\Moon::findOrFail($id);
        return view('moon.edit', ['moon' => $moon]);
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
        $moon = \App\Moon::findOrFail($id);
        $input = Request::all();
        $moon->update($input);
        return redirect('moon/'.$id);
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
