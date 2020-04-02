@extends('templates.main')

@section('titol')
    Taula incidencia
@endsection

@section('main')
    {{-- 
        tablecomplexa: component vue, li passem accio i api corresponent 
        (per a + info, mirar a Controllers\IncidienciaController) 
    --}}
    <div id="app">
        <tablecomplexa  tablaccion= "{{$tablaccion}}" api="{{$api}}"></tablecomplexa>
    </div>
@endsection