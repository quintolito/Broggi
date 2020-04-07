<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vip2Controller extends Controller
{
    //
    public function index()
    {

        /**
         * INDICAREMOS LAS VARIABLES Y PASAREMOS LOS PARAMETROS INDICADOS DE LAS TABLAS
         */
        $api='alertant';
        $tipoaccion="alertant";
        $tablaccion ="alertant";
        $test="Prueba de pasar mas parametros";
        $nomtabla="nom";
        $datamunicipi="municipi.nom";
        $adreca='adreca';
        $telefon='telefon';
        $tipusalertant='tipus_alertant.tipus';
        $nombtablaalertant='Alertant';
        /*
        $api='recurso';
        $test="Prueba de pasar mas parametros";
        $tipoaccion="recurso";
        $tablaccion ="recursos";
        $nomtabla="codi";
        $tipusalertant='recursosid.tipus';
        $nombtablaalertant='Recurs';
        */
       // return view('welcome')->with('api',$api)->with('tipoaccion',$tipoaccion)->with('test',$test)->with('tablaccion',$tablaccion);
      return view('vip', compact('api', 'test','tipoaccion', 'tipusalertant','tablaccion','nomtabla','datamunicipi','adreca','telefon','nombtablaalertant'));

    }
}
