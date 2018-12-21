


@extends('layout.app')
@section('title', 'Inicio')
@section('content')

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
            <div class="carousel-item active" id="carrusel_Id">
                <!--Mask-->
                <div class="view">
                  <img src="/img/b.jpg" class="w-md-100 h-100"/>
                  <div class=" d-flex justify-content-start align-items-center mask  white-text" style="max-height:600px">
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
            </div>
            <div class="carousel-item">
                <div class="view">
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
            </div>
        </div>

    </div>

<main>
          
<div class="d-flex align-items-center justify-content-center  flex-column mx-4" style="min-height:200px; ">
        <h1 class="h1-responsive text-center">Nuestra Oferta Academica</h1>
        <p class="text-center">  Conviértete en un experto en tu área de interés.</p>
</div>

<div >
   
        <section class="container pb-4">
        <h2 class="h2-responsive text-black-50"> Cursos especializados </h2>
               
               <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
               
            @for ($i = 0; $i < count($categories); $i++)
           
                    @if($categories[$i]->isCursoPosgrado == 1)
                       <div class="col-md-3 col-sm-12 mb-4">
                           <div class="card h-100 wow fadeIn" style="height:450px">
                               <img class="card-img-top" src="{{$categories[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text" style="height:50px">{{$categories[$i]['Categoria']}}</h5>
                                   <p class="card-text" style="height:100px">{{$categories[$i]['Descripcion']}}</p>
                                   <a class="card-text float-right font-weight-bold" href="{{route('cursos.categorias',$categories[$i]['Categoria'])}}" >VER MAS</a>                                
                                   <!-- <a class="btn blue darken-3 btn-sm float-right text-white">Conoce más</a> -->
                               </div>
                           </div>
                       </div>
                      @endif                     
            @endfor               
             </div>

            

             <h2 class="h2-responsive mt-4 text-black-50"> Posgrados </h2>
               
               <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
               
            @for ($i = 0; $i < count($categories); $i++)
           
                    @if($categories[$i]->isCursoPosgrado == 0)
                       <div class="col-md-3 col-sm-12 mb-4">
                           <div class="card h-100 wow fadeIn" style="height:450px">
                               <img class="card-img-top" src="{{$categories[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text" style="height:50px">{{$categories[$i]['Categoria']}}</h5>
                                   <p class="card-text" style="height:100px">{{$categories[$i]['Descripcion']}}</p>
                                   <a class="card-text float-right font-weight-bold" href="{{route('cursos.categorias',$categories[$i]['Categoria'])}}" >VER MAS</a>
    
                               </div>
                           </div>
                       </div>
                      @endif                     
            @endfor               
             </div>
             </div >
             </section>
             <div class="d-flex align-items-center justify-content-center  flex-column blue darken-4" style="min-height:225px; ">
                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4 text-center white-text mt-4">
                    <i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i> <br> <br>
                        +20.000 estudiantes
                    </div>
                    <div class="col-sm-12 col-md-4 text-center white-text mt-4 ">
                    <i class="fa fa-check-circle fa-4x" aria-hidden="true"></i> <br> <br>
                   Comprometidos con la Calidad de nuestra enseñanza
                </div>
                <div class="col-sm-12 col-md-4 text-center white-text mt-4">
                <i class="fa fa-globe fa-4x" aria-hidden="true"></i> <br> <br>
                Líderes a nivel Centroamericano
                </div>
                    
                </div>
            </div>
            <section class="container pb-4">
             
                <h2 class="h2-responsive mt-4 text-black-50"> Maestrías </h2>
               
            <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
               
            @for ($i = 0; $i < count($courses); $i++)
                             
                         <div class="col-md-3 col-sm-12 mb-4">
                           <div class="card h-100 wow fadeIn" style="max-height:450px">
                               <img class="card-img-top" src="{{$courses[$i]->Image_URL}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text" style="height:50px">{{$courses[$i]->NombreCurso}}</h5>
                                   <p class="card-text" style="height:100px">{{$courses[$i]->Desc_Publicidad}}</p>
                                   <a class="card-text float-right font-weight-bold" href="/oferta/estudio/{{$courses[$i]->NombreCurso}}" >VER MAS</a>
                                  

                                   <!-- <a class="btn blue darken-3 btn-sm float-right text-white">Conoce más</a> -->
                               </div>
                           </div>
                       </div>
                      
            @endfor               
             </div>

               

        </section>
        
</div>
<div class="d-flex align-items-center justify-content-center flex-column " style="min-height:700px; background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url('/img/b_1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

        <!-- <img src="/img/b.jpg" class="w-md-100 h-100"/>         -->
        <h1 class="h1-responsive text-white text-center">¿Por qué estudiar con nosotros?</h1>
        <p class="text-white text-center">Contamos con las mejores metodologías de enseñanza virtual, docentes calificados y una amplia gama de recursos mediáticos para facilitar el proceso enseñanza-aprendizaje</p>

        <section class="container pt-4">
           
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
                            <h5 class="feature-title  white-text">Conveniencia</h5>
                            <p class="white-text">Acceso 24 horas al día para que aprendas a tu propio ritmo.</p>
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
                            <h5 class="feature-title  white-text">Confianza</h5>
                            <p class="white-text">
                            Apoyo privado de tutores en línea y videochat para debatir temas en grupo.
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
                            <h5 class="feature-title white-text">Calidad</h5>
                            <p class="white-text">
                            Cursos, Posgrados y Maestrías desarrollados por expertos en cada rama. 
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
                            <h5 class="feature-title  white-text">Experiencia</h5>
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
                            <h5 class="feature-title  white-text">Respaldo</h5>
                            <p class="white-text">
                                Certificados por asociaciones internacionales que ratifican nuestra calidad en educación. 
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
                            <h5 class="feature-title  white-text">Facilidad</h5>
                            <p class="white-text">
                                Toda nuestra documentación al alcance de un clic. 
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
       
        <div class="white">
        <h1 class=" h1-responsive  pt-5 w-100 text-center ">Empresas que confían en nuestro trabajo</h1>
        <div class="d-flex align-items-center justify-content-center    " style="height:250px; ">

            <img src="/img/Resources/empresas/BAC.jpg" style="weight:50px"/>       
            <img src="/img/Resources/empresas/BDF.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/CARGILL.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/CEMEX.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/LA-PRENSA.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/MINED.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/MTI.jpg" style="weight:50px"/>                       
            <img src="/img/Resources/empresas/NIMAC.jpg" style="weight:50px"/>                       

         </div>
        </div>
        <div class="grey lighten-4">
            <div class="d-flex align-items-center justify-content-center flex-column " style="min-height:280px; ">
                    <h1 class="h1-responsive text-black-50 text-center ">Lo que opinan de nuestros estudiantes</h1>
                    <p class="text-black-50 text-center">Se parte de nuestra comunidad, y logra el éxito a través del aprendizaje en línea</p>
            </div>
            <div class="container">
                <section>
                    <!--First row-->
                    <div class="row features-small pb-3 wow fadeIn">
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

                                   
              
                
                    

                            

                    
                    </div>
                    <!--/First row-->
                </section>
            </div>
        </div>
</main>

<a id="return-to-top" class="" style="display:none">
        <i class="fa fa-angle-up fa-2x white-text"></i>
    </a>
@endsection

@section('endscript')
                    <script>
                            $('#btnsearchcarrusel').click(function(){
                    
                                        
                                var searchcarrusel = $( "#searchcarruselinput").val();
                                if( searchcarrusel.length > 0){
                                    window.location.href  = "oferta/estudio/find/"+searchcarrusel;
                                }
                            });

                        var inputentercarrusel = document.getElementById("searchcarruselinput");
                        inputentercarrusel.addEventListener("keyup", function(event) {
                                event.preventDefault();
                                if (event.keyCode === 13) {
                                    document.getElementById("btnsearchcarrusel").click();
                                }
                            });

                            window.onscroll = function () { scrollFunction() };
        function scrollFunction() {
            var alto = document.getElementById('navbarsite').clientHeight +100;

            if (document.body.scrollTop > alto || document.documentElement.scrollTop > alto) {
                
                //$('#return-to-top').hide();
                $('#return-to-top').fadeIn(250);

            } else {
               
                
                $('#return-to-top').fadeOut(250);
               
            }
        }

        $('#return-to-top').click(function () {      // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0                       // Scroll to top of body
            }, 500);
        });

                    </script>
                    @endsection