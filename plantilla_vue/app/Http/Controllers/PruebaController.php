<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alertant;
class PruebaController extends Controller
{

    public function index()
    {

        $api='alertant';
        $tipoaccion="alertant";
        $tablaccion ="alertant";
        $test="Prueba de pasar mas parametros";
        //return view('welcome')->with('api',$api)->with('tipoaccion',$tipoaccion)->with('test',$test)->with('tablaccion',$tablaccion);
        return view('welcome', compact('api', 'tipoaccion', 'test', 'tablaccion'));

    }
    public function indexStreetfighterranking()
    {
        $api='StreetFighter';
        return view('welcome')->with('api',$api);
    }
/*
    public function index()
    {
        $alertants = Alertant::all();

        return \view('francisco', \compact('alertants'));
    }*/
}
