@include('layout.CarritoPopover')


<html class="grey lighten-4">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Educando Online</title>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <link rel="icon" href="{{ URL::asset('img/icon.png') }}">
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/mdb.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    

</head>
<body class="grey lighten-4">
   


  <nav class="navbar  fixed-top navbar-expand-lg navbar-light white lighten-5 h-auto wow bounceInDown " id="navbarsite" style="z-index: 999999  !important;">

  <!-- Navbar brand -->
  <a class="navbar-brand"  href="{{route('cursos.index')}} ">Educando Online</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse text-nav" style="height: 50px" id="basicExampleNav">
  <!-- 
  <button type="button" class="btn btn-sm text-white  waves-effect font-weight-bold" style="min-width: 150px; background: #424242; "  >Oferta Academica</button>
   -->              
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      
    <li class="nav-item dropdown "  style="min-width: 150px" >
       <a class="nav-link dropdown-toggle text-muted " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="fa fa-folder-open-o fa-1x text-muted" aria-hidden="true"></i> Oferta Académica</a>
         <div class="dropdown">
         <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" >
            <li class="dropdown-submenu">
                <a  class="dropdown-item" tabindex="-1" onclick="event.preventDefault();
    event.stopPropagation();">Cursos Especializados</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $categoria) 
                    @if($categoria->isCursoPosgrado)
                        <li class="dropdown-item" style="max-height:50px"><a href="{{route('cursos.categorias',$categoria->Categoria)}}">{{$categoria->Categoria}}</a></li>
                        @endif
                    @endforeach        
                </ul>
                </li> 
            <li class="dropdown-submenu">
                <a  class="dropdown-item" tabindex="-1"  onclick="event.preventDefault();
    event.stopPropagation();">Posgrados</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $categoria)
                    @if($categoria->isCursoPosgrado == false) 
                        <li class="dropdown-item" style="max-height:50px"><a href="{{route('cursos.categorias',$categoria->Categoria)}}">{{$categoria->Categoria}}</a></li>
                    @endif
                    @endforeach        
                </ul>
            </li> 
            <a  class="dropdown-item" tabindex="-1" href="{{route('cursos.maestrias')}}">Maestrías</a>
            </li>  
         </u>

        </div>
      </li>

    </ul>
    <!-- Links -->

        
       <div class="input-group md-form form-sm form-2 pl-0 "   >
          <input class="form-control my-0 py-1  waves-effect" type="text" placeholder="Buscar cursos..." aria-label="Search" id="searchinput" style="cursor: text;" >
          <div class="input-group-append ">
            <span class="input-group-text btn-primary waves-effect" id="buttonsearch" onclick="searchnav();"><i class="fa fa-search " aria-hidden="true"></i></span>
          </div>
        </div>      

             <div class="d-block d-sm-none font-weight-bold "><a id="carritosm" class="nav-item nav-link waves-light waves-effect w-sm-100 w-md-100 "  style="min-width:70px;"  onclick="window.location.href = '{{route("carrito")}}';"><i class="fa fa-shopping-cart text-primary fa-2x  " aria-hidden="true"></i>&nbsp;&nbsp;Inversion Total  @if(isset( $GLOBALS["totalcarrito"])) $ {{ $GLOBALS["totalcarrito"]}}@else $ 0 @endif</a></div>
      
             <div class="d-none d-md-block font-weight-bold "><a id="carritomd" class="nav-item nav-link waves-light waves-effect w-sm-100 w-md-100 "  style="min-width:70px;"><i class="fa fa-shopping-cart text-primary fa-2x  " aria-hidden="true"></i></a></div>
      
             
            @guest        
                <button type="button" class="btn btn-sm btn-primary text-white  waves-effect font-weight-bold btn-change"  style="min-width: 150px; " data-toggle="modal" data-target="#modalLoginForm" >Iniciar sesion</button>
                <button type="button" onclick="window.location.href='{{route('registro')}}'" class="btn btn-sm btn-danger waves-effect font-weight-bold "  style="min-width: 150px">Registrate</button>
            @else
         
            @if(Auth::user()->isAdmin)
            <button type="button" class="btn btn-sm btn-primary text-white  waves-effect font-weight-bold btn-change"  style="min-width: 150px;"  onclick="window.location.href='{{route('admin.index')}}'"  >Administracion</button>
              @endif
            <a style="min-width: 250px;" class="d-md-block d-sm-none text-right text-changenav">&nbsp;¡Hola     &nbsp;{{ Auth::user()->estudiante->PrimerNombre.'!'}} &nbsp;</a> 
                <a class="" style="width:80px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  <i class="fas fa-sign-in-alt fa-2x grey-text text-right text-changenav" aria-hidden="true"></i> </a>
                
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                 </form>
        @endguest
  </div>
  <!-- Collapsible content -->

</nav>

<!-- <ul class="nav" style="margin-top:70px">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
 -->
<div id="mainpage " class="" style="margin-top:100px;"> 
            @yield('content')

</div>
            
      <!--   <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
            <a href="#top-section" class="btn-floating btn-large red">
                <i class="fa fa-arrow-up"></i>
            </a>
        </div> -->

 <div class="banner-degradado-1 wow fadeIn" style="height:10px">
</div>

 
    
    <footer class="page-footer font-small stylish-color-dark pt-4    ">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

             <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item" >
                    <a class="btn-floating btn-fb mx-1" href="https://www.facebook.com/UNI.Direccion.Posgrados">
                        <i class="fab fa-facebook-f  fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1" href="https://twitter.com/UNI_POSGRADO">
                        <i class="fab fa-twitter  fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1" href="https://www.linkedin.com/company/universidad-nacional-de-ingenieria-%C2%B7-direcci%C3%B3n-de-posgrado" >
                        <i class="fab fa-linkedin-in  fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1"  href="https://www.instagram.com/unidepec/">
                        <i class="fab fa-instagram  fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1" href="https://www.youtube.com/channel/UC-xl0Fx7MgbntmHuq99SJ3g">
                        <i class="fab fa-youtube-square  fa-2x"> </i>
                    </a>
                </li>

               
              
            </ul>
            <hr>
            <!-- Grid row -->
            <div class="row">


                    @php
                        $cur = $categories->where('isCursoPosgrado',1)->take(8);
                        $pos = $categories->where('isCursoPosgrado',0)->take(8);
                    @endphp
                    <div class="col-md-3 mx-auto">
                        <h6 class="h6-responsive font-weight-bold">Cursos Especializados</h6>               
                         @foreach ($cur as $d)
                            <li ><a href="{{route('cursos.categorias',$d->Categoria)}}">{{$d->Categoria}}</a></li>                            
                        @endforeach
                    </div>
                    <div class="col-md-3 mx-auto">
                        <h6 class="h6-responsive font-weight-bold">Posgrados</h6>
                        @foreach ($pos as $d)
                            <li ><a href="{{route('cursos.categorias',$d->Categoria)}}">{{$d->Categoria}}</a></li>                            
                        @endforeach
                    </div>
                   
                    <div class="col-md-3 mx-auto">
                        <h6 class="h6-responsive font-weight-bold">Maestrías</h6>
                        @foreach ($courses->take(8) as $d)
                            <li ><a href="{{route('cursos.curso',$d->NombreCurso)}}">{{$d->NombreCurso}}</a></li>                            
                        @endforeach
                    </div>

                <!-- Grid column -->
               <!--  <div class="col-md-3 mx-auto"> -->

                    <!-- <a class="twitter-timeline" data-lang="es" data-height="500" href="https://twitter.com/UNI_POSGRADO?ref_src=twsrc%5Etfw">Tweets by UNI_POSGRADO</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->

              <!--   </div> -->
                <!-- Grid column -->
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <!-- <div class="col-md-3 mx-auto"> -->

                    <!-- iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FUNI.Direccion.Posgrados%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->

               <!--  </div> -->
                <!-- Grid column -->

                <!-- <hr class="clearfix w-100 d-md-none"> -->

                <!-- Grid column -->
             

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->

                    <h6 class="h6-responsive font-weight-bold">Contacto</h6>
                    <p>
                        <!-- <strong>Universidad Nacional de Ingeniería</strong><br>
                        Dirección de Posgrado<br>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        2278-1457<br>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        2277-2728<br>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:dirposgrado@pstg.uni.edu.ni">dirposgrado@pstg.uni.edu.ni</a><br>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:dirposgrado@yahoo.com ">dirposgrado@yahoo.com</a> -->
                    </p>


                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <hr>

            <!-- Call to action -->
            @guest
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h6 class="mb-1">Registrarse es gratis</h6>
                </li>
                <li class="list-inline-item">
                    <a href="{{route('registro')}}" class="btn btn-sm btn-danger btn-rounded ">Registrate!</a>
                </li>
            </ul>
            @endguest
            <!-- Call to action -->

           

            <!-- Social buttons -->
           
            <!-- Social buttons -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">

            Estudios Online © {{date('Y')}}
                <!-- Dirección De Estudios de Posgrado y Educación Continua © {{date('Y')}} -->

            </div>

            
            <!-- Copyright -->

    </footer>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.expander.min.js') }}"></script>
  
   <!-- Modals -->
   @include('layout.ModalLogin')



   
    <script>
    
      $(document).ready(function() {
                new WOW().init();
            //$('.mdb-select').materialSelect();
            $('[data-toggle="popover"]').popover();
           
           
        });
          
            

         function searchnav(){
               
                var search = $("#searchinput").val();
                if( search.length > 0){
                    window.location.href  = "{{route('cursos.searchroute')}}/"+search; 
                }
            };

            var inputenter = document.getElementById("searchinput");
                inputenter.addEventListener("keyup", function(event) {
                    event.preventDefault();
                    if (event.keyCode === 13) {
                        document.getElementById("buttonsearch").click();
                    }
                });
            
            
      
        @yield('carrito');

        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                console.log("-50");
                $('#navbarsite').addClass('navbar-black');
                $('#navbarsite').removeClass('navbar-light');
                $('#navbarsite').addClass('navbar-dark');
                
            } else {
                console.log("+50");
                 $('#navbarsite').removeClass('navbar-black');
                 $('#navbarsite').addClass('navbar-light');
                 $('#navbarsite').removeClass('navbar-dark');
            }
        });
     
    </script>

         @yield('endscript')
</body>
</html>
