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
        $factions = \App\Faction::orderBy('name')->get();
        return view('faction.index', ['factions' => $factions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faction.create');
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
        $faction = Faction::create($input);
        $faction->save();
        return redirect("/faction");
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
        $row_count = ceil($factions->count() / 16);
        $width = 562;
        $height = 358;
        $sheet = imagecreatetruecolor($width*7, $row_count * $height);
        for($i=0;$i<$factions->count();$i++){
            echo "Saving " . $factions[$i]->name . "...<br>";
            $status = $factions[$i]->save_as_png('jumbo');
            $name = str_replace(" ", "_", strtolower($factions[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/factions/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*$width, floor($i/7)*$height, 0, 0, $width, $height, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/factions-7x{$row_count}-{$factions->count()}.jpg", 80);
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
        Faction::destroy($id);
        return redirect('faction');
    }
}
