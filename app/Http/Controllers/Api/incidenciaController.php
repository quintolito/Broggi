<?php

namespace App\Http\Controllers\Api;

use App\Models\incidencias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\Utilitat;

use  App\Http\Resources\incidenciaResource;

class incidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incidencias=incidencias::all();
        return new incidenciaResource($incidencias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $incidencia=new incidencias();

        $incidencia->num_incidencia = $request->input('num_incidencia');
        $incidencia->telefon_alertant = $request->input('telefon_alertant');
        $incidencia->data = $request->input('data');
        $incidencia->hora = $request->input('hora');
        $incidencia->adreca = $request->input('adreca');
        $incidencia->complement_adreca = $request->input('complement_adreca');
        $incidencia->descripcio = $request->input('descripcio');
        $incidencia->municipis_id = $request->input('municipis_id');
        $incidencia->tipus_incident_id = $request->input('tipus_incident_id');
        $incidencia->estats_incidencia_id = $request->input('estats_incidencia_id');
        $incidencia->tipus_alertant_id = $request->input('tipus_alertant_id');
        $incidencia->num_incidencia = $request->input('num_incidencia');
        $incidencia->alertants_id = $request->input('alertants_id');



        try {
            $incidencia->save();
            $resposta=(new incidenciaResource($incidencia))->response()->setStatusCode(201);
        } catch (QueryException $e) {
            $error = Utilitat::errorMessage($e);

            $resposta=response()->json(['error'=>$error],400);
                    }

          return     $resposta;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\incidencias  $incidencias
     * @return \Illuminate\Http\Response
     */
    public function show($incidencias)
    {
        //


        $incidencias=incidencias::find($incidencias);
        return new incidenciaResource($incidencias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\incidencias  $incidencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $incidencia= incidencias::find($id);
        $incidencia->num_incidencia = $request->input('num_incidencia');
        $incidencia->telefon_alertant = $request->input('telefon_alertant');
        $incidencia->data = $request->input('data');
        $incidencia->hora = $request->input('hora');
        $incidencia->adreca = $request->input('adreca');
        $incidencia->complement_adreca = $request->input('complement_adreca');
        $incidencia->descripcio = $request->input('descripcio');
        $incidencia->municipis_id = $request->input('municipis_id');
        $incidencia->tipus_incident_id = $request->input('tipus_incident_id');
        $incidencia->estats_incidencia_id = $request->input('estats_incidencia_id');
        $incidencia->tipus_alertant_id = $request->input('tipus_alertant_id');
        $incidencia->num_incidencia = $request->input('num_incidencia');
        $incidencia->alertants_id = $request->input('alertants_id');



        try {
            $incidencia->save();
            $resposta=(new incidenciaResource($incidencia))->response()->setStatusCode(201);
        } catch (QueryException $e) {
            $error = Utilitat::errorMessage($e);

            $resposta=response()->json(['error'=>$error],400);
                    }

          return     $resposta;








    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\incidencias  $incidencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ciudad)
    {
        //

        $incidencias=incidencias::find($id_ciudad);
        if($incidencias!=null){
            try{
                $incidencias->delete();
                $respuesta=  (new incidenciaResource($incidencias))->response()->setStatusCode(200);

            }
            catch(QueryException $e ){
                $mensaje=Utilitat::errorMessage($e);
                $respuesta= response()->json(["error"=> $mensaje ],400);
            }
        }
        else{
            $respuesta= response()->json(["error"=>'REGISTRO NO ENCONTRADO'],404);
        }

        return $respuesta;
    }

}
