<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Dirección de Estudios de Posgrado y Educación Continua
UNI-DEPEC</title>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   

<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/mdb.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >


</head>
<body>
   


  <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse text-nav" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Categorías</a>
         <div class="dropdown">
            
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-item text-white"><a href="#"> <i class="fa fa-flask" aria-hidden="true"> </i> Quimica</a></li>
                <li class="dropdown-item"><a href="#">Some other action</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a tabindex="-1" href="#">Second level</a></li>
                    <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a tabindex="-1" href="#">Second level</a></li>                    
                    <li class="dropdown-item"><a href="#">3th level</a></li>
                    <li class="dropdown-item"><a href="#">3th level</a></li>
                  </ul>
                </li>                    
                    <li class="dropdown-item"><a href="#">Second level</a></li>
                    <li class="dropdown-item"><a href="#">Second level</a></li>
                  </ul>
                </li>
              </ul>
        </div>
      </li>

    </ul>
    <!-- Links -->

    
      <div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
    <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fa fa-search text-white"
        aria-hidden="true"></i></span>
  </div>
  <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
</div>
    
  </div>
  <!-- Collapsible content -->

</nav>
  

    
            @yield('content')
   

    <footer class="page-footer font-small stylish-color-dark pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <a class="twitter-timeline" data-lang="es" data-height="500" href="https://twitter.com/UNI_POSGRADO?ref_src=twsrc%5Etfw">Tweets by UNI_POSGRADO</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                </div>
                <!-- Grid column -->
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FUNI.Direccion.Posgrados%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->

                    <h4>Dirección Posgrado</h4><div class="menu-menu-footer-container">
                        <ul id="menu-menu-footer " class="menu navtex">
                            <li><a href="http://www.posgrado.uni.edu.ni/cursos-de-especializacion/">CURSOS DE ESPECIALIZACIÓN</a></li>
                            <li><a href="http://www.posgrado.uni.edu.ni/posgrado/">POSGRADO</a></li>
                            <li><a href="http://www.posgrado.uni.edu.ni/maestria/">MAESTRIA</a></li>
                            <li><a href="http://www.posgrado.uni.edu.ni/blog/">BLOG</a></li>
                            <li><a href="http://www.posgrado.uni.edu.ni/contactenos/">CONTÁCTENOS</a></li>
                        </ul>
                    </div>


                </div>

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->

                    <h4>Contacto</h4>
                    <p>
                        <strong>Universidad Nacional de Ingeniería</strong><br>
                        Dirección de Posgrado<br>
                        2278-1457<br>
                        2277-2728<br>
                        <a href="mailto:dirposgrado@pstg.uni.edu.ni">dirposgrado@pstg.uni.edu.ni</a><br>
                        <a href="mailto:dirposgrado@yahoo.com ">dirposgrado@yahoo.com</a>
                    </p>


                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <hr>

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Registrarse es gratis</h5>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="btn btn-danger btn-rounded">Registrate!</a>
                </li>
            </ul>
            <!-- Call to action -->

            <hr>

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fa fa-facebook"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fa fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fa fa-google-plus"> </i>
                    </a>
                </li>
              
            </ul>
            <!-- Social buttons -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">


                Dirección De Estudios de Posgrado y Educación Continua © @DateTime.Now.Year

            </div>
            <!-- Copyright -->

    </footer>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
  
   


    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();

        });
      
      

    </script>
</body>
</html>
