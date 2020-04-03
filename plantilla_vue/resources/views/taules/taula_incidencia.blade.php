@extends('templates.main')

@section('titol')
    Taula incidencia
@endsection

@section('main')
    {{-- 
        tablecomplexa: component vue, li passem accio i api corresponent 
        (per a + info, mirar a Controllers\IncidienciaController) 
    --}}
    <div class="card p-3">
        <div card-body>
            <a href="{{-- action('IncidenciaController@create') --}}" class="btn boto-terciari">
                
                <span>
                    NOVA INCIDÈNCIA
                </span>
            </a>
        </div>
    </div>
    <div id="app">
        <tablecomplexa  tablaccion= "{{$tablaccion}}" api="{{$api}}"></tablecomplexa>
    </div>
    
@endsection