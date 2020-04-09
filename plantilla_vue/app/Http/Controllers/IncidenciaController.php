<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Comentar més trad....
    **/
    public function mostrarTaula()
    {
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


        // tornem la vista
        //return view('taules.taula_incidencia', compact('api', 'tipoaccion', 'tipusalertant','tablaccion','nomtabla','nombtablaalertant'));

        return view('taules.taula_incidencia', compact('api', 'test','tipoaccion', 'tipusalertant','tablaccion','nomtabla','datamunicipi','adreca','telefon','nombtablaalertant'));

    }

    public function mostrarForm()
    {
        $tipoaccion ="alertant";
        $test="Prueba de pasar mas parametros";


        return view('forms.form_incidencia', compact('tipoaccion', 'test'));
    }
}
