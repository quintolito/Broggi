@extends('templates.main')

@section('titol')
    Taula incidencia
@endsection

@section('main')
    
    <h1 class="display-4 text_titol">
        INCIDÈNCIES
    </h1>
    <div class="card p-3">
        <div card-body>
            <a href="{{ action('IncidenciaController@mostrarForm')}}" class="btn boto-terciari">
                
                <span>
                    NOVA INCIDÈNCIA
                </span>
            </a>
        </div>
    </div>
    {{-- 
        tablecomplexa: component vue, li passem accio i api corresponent 
        (per a + info, mirar a Controllers\IncidienciaController) 
    --}}
    <div id="app" class="mt-5">
        <tablecomplexa  tablaccion= "{{$tablaccion}}" api="{{$api}}"></tablecomplexa>
    </div>
    
@endsection