<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titol')
    </title>

    {{-- Vinculem el bootstrap --}}
    <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
    {{-- Vinculem el bootstrap --}}
    <link rel="stylesheet" href=" {{ asset('css/our_css.css') }}">
</head>
<body>
    <div id="template">

        <nav class="navbar sticky-top navbar-expand-lg navbar-light">
                     
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <a class="navbar-brand btn text_titol" href="/home" {{-- boto per anar a home o whatever --}}>LOGO BROGGI</a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item active">
                         <a class="nav-link text-white btn boto-primari text_titol" href="#">FORMACIO <span class="sr-only"></span></a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        
        <div class="container-fluid mt-5 mb-5 pb-4">
            @yield('main')
        </div>
        

        <footer class="footer">
            
            
        </footer>

        
    </div>

    <script src=" {{ asset('js/app.js') }} " ></script>
</body>
</html>