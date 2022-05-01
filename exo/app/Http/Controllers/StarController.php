<?php

namespace App\Http\Controllers;
use App\Star;

use Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = \App\Star::orderBy('name')->get();
        return view('star.index', ['stars' => $stars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('star.create');
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
        $star = Star::create($input);
        $star->save();
        return redirect("/star");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $star = \App\Star::find($id);
        return view('star.show', ['star' => $star]);
    }

    public function save_all_as_png(){
        $stars = \App\Star::all();
        $row_count = ceil($stars->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$stars->count();$i++){
            echo "Saving " . $stars[$i]->name . "...<br>";
            $status = $stars[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($stars[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/stars/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/stars-16x{$row_count}-{$stars->count()}.jpg", 80);
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
        $star = \App\Star::findOrFail($id);
        return view('star.edit', ['star' => $star]);
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
        $star = \App\Star::findOrFail($id);
        $input = Request::all();
        $star->update($input);
        return redirect('star/'.$id);
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
