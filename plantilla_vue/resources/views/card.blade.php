
@extends('templates.main')



@section('main')

<div class="container containercard">

  <div class="card-deck" >
      <div class="card text-center" id="card-boostrap">
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-zTVIvOtz5Va3qA2i8-LpG8XxpM93jeLDyqGxGUxz3n6cH7o6" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">INCIDENCIAS</h5>
          <button type="button" class="btn boto-primari"  onclick="window.location='{{ url('/taula_incidencia') }}'" action>INCIDENCIAS</button>
        </div>
      </div>
    <div class="card text-center" id="card-boostrap">
      <img class="card-img-top" src="https://www.serviciosemergencia.es/images/galerias/portada/5ab4b35ee554f.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">RECURS MOVIL</h5>
        <button type="button" class="btn boto-primari"  onclick="window.location='{{ url('/Recursos') }}'" action>RECURSOS</button>
      </div>
    </div>

    <div class="card text-center" id="card-boostrap" action>
      <img class="card-img-top" src="https://www.consalud.es/uploads/s1/97/22/26/asi-quedara-la-fachada-del-nuevo-hospital-universitario-la-paz-integrado-en-la-red-publica-de-la-comunidad-de-madrid.jpeg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">VIP</h5>
        <button type="button" class="btn  boto-primari"  onclick="window.location='{{ url('/alertant') }}'" action>VIP</button>
      </div>
    </div>

</div>


@endsection
