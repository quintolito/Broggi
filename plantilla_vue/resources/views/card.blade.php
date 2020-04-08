
@extends('templates.main')



@section('main')

<div class="container">






    <div class="card-deck" >
<div class="card" id="card-boostrap">
  <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-zTVIvOtz5Va3qA2i8-LpG8XxpM93jeLDyqGxGUxz3n6cH7o6" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">la cruz</h5>
    <p class="card-text">podemos invertir todas tus cruces si lo deseas somos satanistas somos legiones no creemos en nadie, podemos asesinar al papa.</p>
    <p class="card-text"><small class="text-muted">valido hasta el 1 de marzo</small></p>
  </div>
</div>
<div class="card" id="card-boostrap">
  <img class="card-img-top" src="https://www.serviciosemergencia.es/images/galerias/portada/5ab4b35ee554f.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Recursos movils</h5>
    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

    <button type="button" class="btn boto-primari"  onclick="window.location='{{ url('/Recursos') }}'" action>RECURSOS</button>


  </div>
</div>
<div class="card" id="card-boostrap" action>
  <img class="card-img-top" src="https://www.consalud.es/uploads/s1/97/22/26/asi-quedara-la-fachada-del-nuevo-hospital-universitario-la-paz-integrado-en-la-red-publica-de-la-comunidad-de-madrid.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Gestio de alertants</h5>

        <button type="button" class="btn  boto-primari"  onclick="window.location='{{ url('/alertant') }}'" action>VIP</button>


  </div>
</div>
</div>





</div>



@endsection
