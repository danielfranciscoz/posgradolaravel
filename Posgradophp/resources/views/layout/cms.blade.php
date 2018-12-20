<html class="grey lighten-4">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - CMS/Dirección de Estudios de Posgrado y Educación Continua
UNI-DEPEC</title>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   

<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/mdb.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >


</head>
<body class="grey lighten-4">
<nav class="navbar navbar-expand-lg navbar-dark indigo darken-4">
<a class="navbar-brand" href="/admin">Posgrado</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestiones</a>
                <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item waves-effect waves-light" href="/admin/categorias">Categorias</a>
                    <a class="dropdown-item waves-effect waves-light" href="/admin/cursos">Cursos</a>
                    <a class="dropdown-item waves-effect waves-light" href="/admin/comentarios">Comentarios</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


<main>
@yield('content');
</main>
<footer class="page-footer font-small indigo darken-4 fixed-bottom">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright:
  <a href="https://posgrado.uni.edu.ni"> Posgrado UNI</a>
</div>
<!-- Copyright -->

</footer>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
  

   <!-- Modals -->
   @include('layout.ModalLogin')



   
    <script>
    
      $(document).ready(function() {
                new WOW().init();
                
            $('[data-toggle="popover"]').popover();
           
           
        });
          
    </script>

     @yield('endscript');
</body>
</html>
