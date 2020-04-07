
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
    <a href="{{ action('PruebaController@index')}}" class="btn boto-terciari">

        <button type="button" class="btn btn-outline-danger">Danger</button>

  </div>
</div>
<div class="card" id="card-boostrap">
  <img class="card-img-top" src="https://www.consalud.es/uploads/s1/97/22/26/asi-quedara-la-fachada-del-nuevo-hospital-universitario-la-paz-integrado-en-la-red-publica-de-la-comunidad-de-madrid.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Gestio de alertants</h5>

    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    <a href="{{ action('PruebaController@moostrarvip')}}" class="btn boto-terciari">
        <button type="button" class="btn btn-outline-danger">Danger</button>


  </div>
</div>
</div>





</div>



@endsection
