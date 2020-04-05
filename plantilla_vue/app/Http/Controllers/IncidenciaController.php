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
        $tablaccion ="alertant";

        // tornem la vista
        return view('taules.taula_incidencia', compact('api', 'tablaccion'));
    }

    public function mostrarForm()
    {
        $tipoaccion ="alertant";
        $test="Prueba de pasar mas parametros";

        
        return view('forms.form_incidencia', compact('tipoaccion', 'test'));
    }
}
