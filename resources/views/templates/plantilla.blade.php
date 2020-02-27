<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

</head>
<body>
    <!-- https://stackoverflow.com/questions/39217975/in-laravel-5-whats-the-difference-between-url-and-asset-->


      <div class="container-fluid">
            @yield('subtitulo')
      </div>



</body>
</html>



