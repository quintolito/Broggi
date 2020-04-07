@extends('templates.main')

@section('titol')
    Taula incidencia
@endsection

@section('main')
        <div id="app">
            <sumbittest></sumbittest>


            <modal-post test= "{{$test}}" tipoaccion= "{{$tipoaccion}}"></modal-post>

            <!-- <example-component></example-component> -->
            <!-- EN CADA COMPONENTE PONDREMOS LAS VARIABLES INDICADA PARA CREAR LA  TABLA CON SU CAMPOS CORRESPONDIENTES-->
        <tablecomplexa  tablaccion= "{{$tablaccion}}" api="{{$api}}" nomtabla="{{$nomtabla}}"
        datamunicipi="{{ $datamunicipi }}"
        adreca="{{ $adreca }}"
        telefon="{{ $telefon }}"

        tipusalertant="{{ $tipusalertant }}"
        nombtablaalertant="{{ $nombtablaalertant }}"



        ></tablecomplexa>

        <probademodal></probademodal>
            <p>{{$tipoaccion}} {{$test}}</p>
        </div>
@endsection

