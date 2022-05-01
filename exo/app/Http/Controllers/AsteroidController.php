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
        return view('asteroid.create');
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
        $asteroid = Asteroid::create($input);
        $asteroid->save();
        return redirect("/asteroid");
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
        $row_count = ceil($asteroids->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$asteroids->count();$i++){
            echo "Saving " . $asteroids[$i]->name . "...<br>";
            $status = $asteroids[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($asteroids[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/asteroids/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/asteroids-16x{$row_count}-{$asteroids->count()}.jpg", 80);
        imagedestroy($sheet);
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
        Asteroid::destroy($id);
        return redirect('asteroid');
    }
}
