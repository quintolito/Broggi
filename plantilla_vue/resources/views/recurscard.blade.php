@extends('templates.main')



@section('main')

<div class="container containercard">

  <div class="card-deck" >
      <div class="card text-center" id="card-boostrap">
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-zTVIvOtz5Va3qA2i8-LpG8XxpM93jeLDyqGxGUxz3n6cH7o6" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">GESTIONAR INCIDÈNCIES ASSIGNADES</h5>
          <button type="button" class="btn boto-primari"  onclick="window.location='{{ url('/taula_incidencia_recursmovil') }}'" action>GESTIONAR INCIDÈNCIES ASSIGNADES</button>
        </div>
      </div>
    <div class="card text-center" id="card-boostrap">
      <img class="card-img-top" src="https://www.serviciosemergencia.es/images/galerias/portada/5ab4b35ee554f.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">INCIDÈNCIES OBERTES</h5>
        <button type="button" class="btn boto-primari"  onclick="window.location='{{ url('/Recursos') }}'" action>INCIDÈNCIES OBERTES</button>
      </div>
    </div>

</div>


@endsection
