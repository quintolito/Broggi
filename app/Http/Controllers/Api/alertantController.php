<?php

namespace App\Http\Controllers\Api;

use App\Models\Alertant;
use App\Models\Municipi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\Utilitat;

use  App\Http\Resources\alertantResource;

class alertantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Alertant=Alertant::all();
        return new alertantResource($Alertant);
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


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function show(Alertant $alertant)
    {
        //

        $alertant = Alertant::with('municipi')->find($alertant->id);

        return new alertantResource($alertant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alertant $alertant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertant $alertant)
    {
        //
    }
}
