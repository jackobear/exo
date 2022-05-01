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
        $stats = \App\Action::get_stats();
        return view('action.index', ['actions' => $actions, 'stats' => json_encode($stats)]);
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
        set_time_limit(60*10);
        $actions = \App\Action::all();
        $total_quantity = 0;
        foreach($actions as $action) {
            if($action->name != 'Trade Ship') {
                $total_quantity += $action->quantity;
            }
        }
        $row_count = ceil($total_quantity / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        $index = 0;
        for($i=0;$i<$actions->count();$i++){
            echo "Saving " . $actions[$i]->name . "...<br>";
            $status = $actions[$i]->save_as_png();
            if ($actions[$i]->name != 'Trade Ship'){
                $name = str_replace(" ", "_", strtolower($actions[$i]->name));
                $filename = "/var/www/exo/public/img/cards-jpeg/actions/{$name}.jpg";
                $image = imagecreatefromjpeg($filename);
                for($j=0;$j<$actions[$i]->quantity;$j++){
                    $row = floor($index/16);
                    imagecopymerge($sheet, $image, $index*256 - $row*4096, $row*358, 0, 0, 256, 358, 100);
                    $index++;
                }
            }
            print_r($status);
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/actions-16x{$row_count}-{$actions->count()}.jpg", 80);
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
