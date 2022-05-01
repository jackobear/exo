<?php

namespace App\Http\Controllers;
use App\HabitableWorld;

use Request;

class HabitableWorldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitable_worlds = \App\HabitableWorld::orderBy('name')->get();
        return view('habitable_world.index', ['habitable_worlds' => $habitable_worlds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habitable_world.create');
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
        $habitable_world = HabitableWorld::create($input);
        $habitable_world->save();
        return redirect("/habitable-world");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitable_world = \App\HabitableWorld::find($id);
        $habitable_world->body = $this->format_resources($habitable_world->body);
        return view('habitable_world.show', ['habitable_world' => $habitable_world]);
    }

    public function save_all_as_png(){
        $habitable_worlds = \App\HabitableWorld::all();
        $row_count = ceil($habitable_worlds->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$habitable_worlds->count();$i++){
            echo "Saving " . $habitable_worlds[$i]->name . "...<br>";
            $status = $habitable_worlds[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($habitable_worlds[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/habitable-worlds/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/habitable_worlds-16x{$row_count}-{$habitable_worlds->count()}.jpg", 80);
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
        $habitable_world = \App\HabitableWorld::findOrFail($id);
        return view('habitable_world.edit', ['habitable_world' => $habitable_world]);
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
        $habitable_world = \App\HabitableWorld::findOrFail($id);
        $input = Request::all();
        $habitable_world->update($input);
        return redirect('habitable-world/'.$id);
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
