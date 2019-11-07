<?php

namespace App\Http\Controllers;
use App\Action;

use Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = \App\Action::orderBy('name')->get();
        return view('action.index', ['actions' => $actions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action.create');
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
        $action = Action::create($input);
        $action->save();
        return redirect("/action");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = \App\Action::find($id);
        $action->body = $this->format_resources($action->body);
        return view('action.show', ['action' => $action]);
    }

    public function decklist()
    {
        $actions = \App\Action::orderBy('name')->get();
        return view('action.decklist', ['actions' => $actions]);
    }

    public function save_all_as_png(){
        $actions = \App\Action::all();
        foreach($actions as $action){
            echo "Saving " . $action->name . "...<br>";
            $status = $action->save_as_png();
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
        $action = \App\Action::findOrFail($id);
        return view('action.edit', ['action' => $action]);
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
        $action = \App\Action::findOrFail($id);
        $input = Request::all();
        $action->update($input);
        return redirect('action/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Action::destroy($id);
        return redirect('action');
    }
}
