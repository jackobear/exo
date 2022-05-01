<?php

namespace App\Http\Controllers;
use App\Lifeform;

use Request;

class LifeformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lifeforms = \App\Lifeform::orderBy('name')->get();
        return view('lifeform.index', ['lifeforms' => $lifeforms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lifeform.create');
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
        $lifeform = Lifeform::create($input);
        $lifeform->save();
        return redirect("/lifeform");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lifeform = \App\Lifeform::find($id);
        $lifeform->body = $this->format_resources($lifeform->body);
        return view('lifeform.show', ['lifeform' => $lifeform]);
    }

    public function save_all_as_png(){
        $lifeforms = \App\Lifeform::all();
        $row_count = ceil($lifeforms->count() / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=0;$i<$lifeforms->count();$i++){
            echo "Saving " . $lifeforms[$i]->name . "...<br>";
            $status = $lifeforms[$i]->save_as_png();
            $name = str_replace(" ", "_", strtolower($lifeforms[$i]->name));
            $filename = "/var/www/exo/public/img/cards-jpeg/lifeforms/{$name}.jpg";
            $image = imagecreatefromjpeg($filename);
            imagecopymerge($sheet, $image, $i*256, floor($i/16)*358, 0, 0, 256, 358, 100);
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/lifeforms-16x{$row_count}-{$lifeforms->count()}.jpg", 80);
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
        $lifeform = \App\Lifeform::findOrFail($id);
        return view('lifeform.edit', ['lifeform' => $lifeform]);
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
        $lifeform = \App\Lifeform::findOrFail($id);
        $input = Request::all();
        $lifeform->update($input);
        return redirect('lifeform/'.$id);
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
