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
        $planets = \App\Planet::orderBy('name')->get();
        $stats = \App\Planet::get_stats();
        return view('planet.index', ['planets' => $planets, 'stats' => json_encode($stats)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planet.create');
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
        $planet = Planet::create($input);
        $planet->save();
        return redirect("/planet");
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
        $row_count = ceil($planets->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$planets->count();$i++){
            echo "Saving " . $planets[$i]->name . "...<br>";
            $status = $planets[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($planets[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/planets/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/planets-16x{$row_count}-{$planets->count()}.jpg", 80);
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
