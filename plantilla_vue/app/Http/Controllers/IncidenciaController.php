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
        $api='privincia';
        $tablaccion ="alertant";

        // tornem la vista
        return view('taules.taula_incidencia', compact('api', 'tablaccion'));
    }
}
