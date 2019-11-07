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
        foreach($lifeforms as $lifeform){
            echo "Saving " . $lifeform->name . "...<br>";
            $status = $lifeform->save_as_png();
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
