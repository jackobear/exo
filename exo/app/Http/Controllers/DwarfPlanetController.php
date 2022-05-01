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
        $row_count = ceil($dwarf_planets->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$dwarf_planets->count();$i++){
            echo "Saving " . $dwarf_planets[$i]->name . "...<br>";
            $status = $dwarf_planets[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($dwarf_planets[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/dwarf-planets/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/dwarf_planets-16x{$row_count}-{$dwarf_planets->count()}.jpg", 80);
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
        DwarfPlanet::destroy($id);
        return redirect('dwarf-planet');
    }
}
