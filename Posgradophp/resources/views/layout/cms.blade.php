<html class="grey lighten-4">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Administración de Contenido</title>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   

<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/mdb.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('DataTables/datatables.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('DataTables/Datatables-1.10.18/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('DataTables/Select-1.2.6/css/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" >

</head>
<body class="grey lighten-4">
<nav class="navbar navbar-expand-lg navbar-dark indigo darken-4">
<a class="navbar-brand" href="{{route('admin.index')}}">Posgrado</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestiones</a>
                <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.categorias')}}">Categorias</a>
                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.cursos')}}">Cursos</a>
                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.comentarios')}}">Comentarios</a>
                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.docentes')}}">Docentes</a>
                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.usuarios')}}">Usuarios</a>
                </div>
            </li>
            <a class="nav-item btn btn-primary btn-sm" href="{{ route('cursos.index') }}">Ver sitio</a>
        </ul>
    </div>
</nav>


<main>
@yield('content');
</main>
<footer class="page-footer font-small indigo darken-4 fixed-bottom">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© {{@date("Y")}} Copyright:
  <a href="https://posgrado.uni.edu.ni"> Posgrado UNI</a>
</div>
<!-- Copyright -->

</footer>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/Datatables-1.10.18/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/Select-1.2.6/js/select.bootstrap4.js') }}"></script>
    

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
