<?php

namespace App\Http\Controllers;
use App\Asteroid;

use Request;

class AsteroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asteroids = \App\Asteroid::orderBy('name')->get();
        return view('asteroid.index', ['asteroids' => $asteroids]);
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
        $asteroid = \App\Asteroid::find($id);
        $asteroid->body = $this->format_resources($asteroid->body);
        return view('asteroid.show', ['asteroid' => $asteroid]);
    }

    public function save_all_as_png(){
        $asteroids = \App\Asteroid::all();
        foreach($asteroids as $asteroid){
            echo "Saving " . $asteroid->name . "...<br>";
            $status = $asteroid->save_as_png();
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
        $asteroid = \App\Asteroid::findOrFail($id);
        return view('asteroid.edit', ['asteroid' => $asteroid]);
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
        $asteroid = \App\Asteroid::findOrFail($id);
        $input = Request::all();
        $asteroid->update($input);
        return redirect('asteroid/'.$id);
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
