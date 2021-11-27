<?php

namespace App\Http\Controllers;

use App\Factories\SimulationFactory;
use Request;

class SimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simulations = SimulationFactory::buildSimulationList();
        return view('simulation.index', ['simulations' => $simulations]);
    }

}
