


@extends('layout.app')
@section('title', 'Inicio')
@section('content')

   <!-- <img src="https://www.posgrado.uni.edu.ni/wp-content/uploads/2018/06/docentes.jpg" class="img-fluid"/> -->
   <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner " role="listbox" style="max-height:600px">

            <!--First slide-->
            <div class="carousel-item active">
                <!--Mask-->
                <div class="view">
                  <!--Video source-->
                  <!-- <video autoplay="" loop="" playsinline="">
                      <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4">
                  </video> -->
                  <!-- Carousel content -->
                  <img src="/img/b.jpg" class="w-md-100 h-100"/>
                  <div class=" d-flex justify-content-start align-items-center mask rgba-indigo-light white-text" style="max-height:600px">
                        <div class="col-lg-4 col-md-12">

            <!--Panel-->
                            <div class="card card-body white-text" style=" background-color:rgba( 255, 255,255, 0.1)">  
                                <h4 class="card-text black-text text-justify  white-text"  > "La enseñanza que deja huella no es la que se hace de cabeza a cabeza, sino de corazón a corazón" </h4>                          
                              <p class="card-text white-text"> 
                                  Howard G. Hendricks
                              </p>
                              <div class="input-group md-form form-sm form-2 pl-0">
                              <input class="form-control my-0 py-1 red-border" id="searchcarruselinput" type="text" placeholder="¿Qué deseas Aprender?" aria-label="Search">
                              <div class="input-group-append" id="btnsearchcarrusel" >
                                <a class="input-group-text btn-primary white-text"  ><i class="fa fa-search white-text"  aria-hidden="true"></i></a>
                              </div>
                            </div>
                            </div>
                            <!--/.Panel-->

                          </div>
                  </div>

                </div>
                <!--/Mask-->
            </div>
            <!--/First slide-->

            <!--Second slide-->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <!--Video source--><!--
                    <video autoplay="" loop="" playsinline="">
                        <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4">
                    </video> -->
                    <!-- Carousel content -->
                    <div class="full-bg-img flex-center mask rgba-purple-light white-text">
                      <ul class="animated fadeInUp col-md-12 list-unstyled">
                        <li>
                          <h1 class="font-weight-bold text-uppercase">Lots of tutorials at your disposal</h1>
                        </li>
                        <li>
                          <p class="font-weight-bold text-uppercase py-4">And all of them are FREE!</p>
                        </li>
                        <li>
                          <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-pink btn-rounded btn-lg waves-effect waves-light">Start learning</a>
                        </li>
                      </ul>
                    </div>
                </div>
                <!--/Mask color-->
            </div>
            <!--/Second slide-->

            <!--Third slide-->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <!--Video source--><!--
                    <video autoplay="" loop="" playsinline="">
                        <source src="https://mdbootstrap.com/images/video/Tropical.mp4" type="video/mp4">
                    </video>-->

                    <!-- Carousel content -->
                    <div class="full-bg-img flex-center mask rgba-blue-light white-text">                  
                      <ul class="animated fadeInUp col-md-12 list-unstyled">
                        <li>
                          <h1 class="font-weight-bold text-uppercase">Visit our support forum</h1></li>
                        <li>
                          <p class="font-weight-bold text-uppercase py-4">Our community can help you with any question</p>
                        </li>
                        <li>
                          <a target="_blank" href="https://mdbootstrap.com/forums/forum/support/" class="btn btn-lg btn-indigo btn-rounded waves-effect waves-light">Support forum</a>
                        </li>
                      </ul>
                    </div>
                </div>
                <!--/Mask color-->
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <!-- <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
        <!--/.Controls-->
    </div>

<main>
  
        <!--Section: Main info-->
       <!--  <section class="mt-5 wow fadeIn">
           
            <div class="row grey lighten-4">
               
                <div class="col-md-4 mb-4  d-flex justify-content-center  align-items-center">

                 <div>  
                                <p class="font-weight-bold text-carrousel-cursos">La selección de cursos más amplia del pais </p>                     
                              <p class="grey-text">  
                                Elige entre más de 300 cursos con nuevo contenido cada mes

                               

                              </p>
                             
                </div>

                    
                </div>
              
                <div class="col-md-8 mb-4">
                
                   
                  
                </div>
               
            </div>
           
        </section> -->

 <div class="d-flex align-items-center justify-content-center  mt-5 " style="min-height:100px; ">
        <h1 class="h1-responsive text-center ">Nosotros somos Posgrado</h1>
</div>
<section class="container pt-5 pb-4">
    <div class=row>
        <div class="col-sm-12 col-md-6 text-justify text-body mb-4">
        El Sistema de Estudios de Posgrado y Educación Continua tiene como objetivo la capacitación y formación de profesionales en el más alto nivel técnico y científico, en el ámbito de las diversas disciplinas para que sean capaces de desarrollar sus actividades de forma independiente y provechosa para el desarrollo del país. El sistema se integra por todos los programas y unidades académicas que ofrecen cursos especializados y de Maestría y Doctorado teniendo como instancia reguladora a la Dirección de Estudios de Posgrado y Educación Continua y como instancias ejecutoras a las facultades y a la Dirección de Estudios de Posgrado y Educación Continua 
            
        </div>
        <div class="col-sm-12 col-md-6 ">

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Emlt4VmOFoI" allowfullscreen></iframe>
            </div>
                  
        </div>

    </div>

</section>
        
<div class="d-flex align-items-center justify-content-center  flex-column  banner-degradado-1  mt-5 " style="min-height:325px; ">
        <h1 class="h1-responsive text-white text-center">Nuestras Categorias de Cursos</h1>
        <p class="text-white">  Conviértete en un experto en tu área de interés.</p>
</div>

<div >
   
        <section class="container pt-5 pb-4">
      
            <!--Grid row-->
            <div class="row wow fadeIn">
               
            @for ($i = 0; $i < count($categorias); $i++)
                    
                       <div class="col-md-3 col-sm-12 mb-4">
                           <div class="card h-100 wow fadeIn" style="max-height:450px">
                               <img class="card-img-top" src="{{$categorias[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text">{{$categorias[$i]['Categoria']}}</h5>
                                   <p class="card-text">{{$categorias[$i]['Descripcion']}}</p>
                                   <a class="card-text float-right font-weight-bold" href="{{route('cursos.categorias',$categorias[$i]['Categoria'])}}" >SABER MAS</a>
                                  

                                   <!-- <a class="btn blue darken-3 btn-sm float-right text-white">Conoce más</a> -->
                               </div>
                           </div>
                       </div>
                                           
            @endfor               
             </div>

               

        </section>
        
</div>
<div class="d-flex align-items-center justify-content-center flex-column banner-degradado-1" style="min-height:325px; ">
        <h1 class="h1-responsive text-white text-center">¿Por qué estudiar con nosotros?</h1>
        <p class="text-white">Somos tu mejor opción virtual</p>
</div>
<div class="banner-degradado-1 pb-5" >
        <section class="container ">
           
            <!--Grid row-->
            <div class="row wow fadeIn ">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3 ">
                            <i class="fa fa-calendar  fa-2x  white-text "></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Conveniencia</h5>
                            <p class="white-text">Acceso 24 horas al día para que aprendas a tu propio ritmo y en español</p>
                        </div>
                    </div>
                    <!--/First row-->
                    <div style="height:30px"></div>
                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-users fa-2x white-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Confianza</h5>
                            <p class="white-text">
                            Apoyo privado de tutores online y videochat ‘Tutor Café’ para debatir temas en grupo
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->
                    <div style="height:30px"></div>
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-line-chart fa-2x white-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Calidad</h5>
                            <p class="white-text">
                            Cursos online desarrollados por líderes de la industria. 
                            <br>
                            </p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <div class="col-lg-6 col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-map-o fa-2x white-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Experiencia</h5>
                            <p class="white-text">Cientos de horas de ejercicios reales con las que puedes crear o enriquecer tu portafolio. </p>
                        </div>
                    </div>
                    <!--/First row-->
                    <div style="height:30px"></div>
                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-mortar-board fa-2x white-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Respaldo</h5>
                            <p class="white-text">
                                Certificados con aplicaciones internacionales y validez en LinkedIn. 
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->
                    <div style="height:30px"></div>
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-thumbs-o-up fa-2x white-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title font-weight-bold white-text">Facilidad</h5>
                            <p class="white-text">
                            Sin requisitos ni conocimiento previo. 
                            </p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
               
            </div>
            <!--/Grid row-->
        </section>
        <!--Section: Main features & Quick Start-->
        </div>
        <div class="indigo lighten-5">
            <div class="d-flex align-items-center justify-content-center flex-column " style="min-height:280px; ">
                    <h1 class="h1-responsive black-white text-center ">Lo que opinan de nuestros estudiantes</h1>
                    <p class="black-white">Se parte de nuestra comunidad, y logra el éxito a través del aprendizaje en línea</p>
            </div>
            <div class="container">
                <section>
                    <!--First row-->
                    <div class="row features-small mb-5 pb-3 wow fadeIn">
                                    <section class="carousel slide col-12" data-ride="carousel" id="carousel-cursos">
                                    <div class="container" style="position: absolute; z-index: 99998; margin-top:15%">
                                        <div class="d-flex " >
                                            <div class="mr-auto" style="margin-left:-30px" >
                                                    <a class="btn white btn-circle" href="#carousel-cursos" role="button" data-slide="prev">
                                                    <i class="fa fa-chevron-left center-ico-button grey-text " aria-hidden="true"></i>                                            
                                                </a>
                                            </div>
                                            <div class="ml-auto " style="margin-right:10px">
                                                <a class="btn white btn-circle" href="#carousel-cursos" role="button" data-slide="next">
                                                <i class="fa fa-chevron-right center-ico-button grey-text" aria-hidden="true"></i> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container pt-0 mt-2">
                                        <div class="carousel-inner">
                                        @php $contador = 0;@endphp

                                            @while($contador < count($comentarios))
                                                @if($contador==0)
                                                    <div class="carousel-item active">
                                                @else
                                                    <div class="carousel-item">
                                                @endif

                                                <div class="card-deck h-100 mb-2" style="max-height:375px">
                                                @php $tres = 3+$contador;@endphp
                                                @for ($i = $contador; ($i < count($comentarios) && $i < $tres ); $i++)
                                                    <div class="card h-100 " style="max-height:375px" >                                                
                                                        <div class="card-body pt-2" >
                                                        <div class="d-flex justify-content-center">
                                                            <img class="img-fluid rounded-circle"  style="max-height:150px; max-weight:150px" src="{{$comentarios[$i]['Image_URL']}}" alt="comentario {{$comentarios[$i]['Nombre']}}">
                                                        </div><br>
                                                            <a
                                                            class="card-title text-center" >{{$comentarios[$contador]['Nombre']}}
                                                            </a> <br>
                                                            
                                                            <p class="card-text font-italic" style="height:100px">"{{$comentarios[$contador]['Comentario']}}"</p>
                                                            <hr>
                                                            <a class="card-meta"></a>
                                                            <p class="card-meta float-right" style="font-size:12;height:50px">{{$comentarios[$contador]['Profesion']}} - {{$comentarios[$contador]['Desc_Pais']}}</p>                                            
                                                        </div>            
                                                    </div>
                                                    @php $contador++; @endphp
                                                @endfor
                                                @if(count($comentarios)%3!=0 && $contador == count($comentarios))   
                                                @php $multiplo=count($comentarios); @endphp
                                                    @while($multiplo%3!=0)
                                                        <div class="card h-100" style="-webkit-box-shadow:none; box-shadow:none; background:transparent;max-height:375px;" >                        
                                                        </div>
                                                    @php $multiplo++; @endphp
                                                    @endwhile
        
                                                @endif
                                                </div>
                                            </div>
                                            
                                            @endwhile
                                        
                                            
                                            
                                    </div>
                                    </section>

                    <script>
                            $('#btnsearchcarrusel').click(function(){
                    
                                        
                                var searchcarrusel = $( "#searchcarruselinput").val();
                                if( searchcarrusel.length > 0){
                                    window.location.href  = "/curso/find/"+searchcarrusel;
                                }
                            });

                        var inputentercarrusel = document.getElementById("searchcarruselinput");
                        inputentercarrusel.addEventListener("keyup", function(event) {
                                event.preventDefault();
                                if (event.keyCode === 13) {
                                    document.getElementById("btnsearchcarrusel").click();
                                }
                            });
                    </script>
                
                    

                            

                    
                    </div>
                    <!--/First row-->
                </section>
            </div>
        </div>
</main>
@endsection

