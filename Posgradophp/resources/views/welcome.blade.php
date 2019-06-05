


@extends('layout.app')
@section('title', 'Inicio')
@section('content')

   <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false" style="max-height:600px">
        <!--Indicators-->
  
        <!--/.Indicators-->

        <!--Slides-->
        <div class="h-50 w-100 d-block d-sm-none" role="listbox" style="max-height:600px">

            <!--First slide-->
            <div class="" id="carrusel_Id">
                <!--Mask-->
                <div class="view">
                  <img src="{{URL::asset('img/br.jpg')}}" class="w-100 h-100 d-block d-sm-none"/>
               
                  <div class=" d-flex justify-content-start align-items-center mask  white-text" style="max-height:600px">
                        <div class="col-lg-4 col-md-12 wow zoomIn">

            <!--Panel-->
                            <div class="card card-body white-text " style=" background-color:rgba( 255, 255,255, 0.1)">  
                                <h4 class="card-text black-text text-justify  white-text"  > "La enseñanza que deja huella no es la que se hace de cabeza a cabeza, sino de corazón a corazón" </h4>                          
                              <p class="card-text white-text"> 
                                  Howard G. Hendricks
                              </p>
                              <div class="input-group md-form form-sm form-2 pl-0">
                              <input class="form-control my-0 py-1 red-border" id="searchcarruselinputsm" type="text" placeholder="¿Qué deseas Aprender?" aria-label="Search">
                              <div class="input-group-append" id="btnsearchcarruselsm" >
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
           
         
        </div>

        <div class="h-100 w-100 d-none d-md-block" role="listbox" style="max-height:600px">

            <!--First slide-->
            <div class="" id="carrusel_Id">
                <!--Mask-->
                <div class="view">
                <img src="{{URL::asset('img/b.jpg')}}" class="w-100 h-100 d-none d-md-block"/>
              <!--   <video  autoplay  mute loop class="w-100 d-none d-md-block">
                     <source src="{{URL::asset('video/main.webm')}}" type="video/webm"></source>
                </video> -->
               
                  <div class=" d-flex justify-content-start align-items-center mask  white-text" style="max-height:600px">
                        <div class="col-lg-4 col-md-12">

            <!--Panel-->
                            <div class="card card-body white-text" style=" background-color:rgba( 0, 0,0, 0.3)">  
                                <h4 class="card-text black-text text-justify  white-text"> "La enseñanza que deja huella no es la que se hace de cabeza a cabeza, sino de corazón a corazón" </h4>                          
                              <p class="card-text white-text"> 
                                  Howard G. Hendricks
                              </p>
                              <div class="input-group md-form form-sm form-2 pl-0">
                              <input class="form-control my-0 py-1 red-border white-text" id="searchcarruselinputmd" type="text" placeholder="¿Qué deseas Aprender?" aria-label="Search">
                              <div class="input-group-append" id="btnsearchcarruselmd" >
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
           
         
        </div>

    </div>

<main>
          
<div class="d-flex align-items-center justify-content-center  flex-column mx-4 mt-5  wow zoomIn"  style="min-height:200px; ">
        <h1 class="h1-responsive text-center">Nuestra Oferta Academica</h1>
        <p class="text-center">  Conviértete en un experto en tu área de interés.</p>
</div>

<div >
   
        <section class="container pb-4">
        <h2 class="h2-responsive text-black-50 wow pulse"> Cursos especializados </h2>
               
               <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
            @php $delay=0; @endphp
            @for ($i = 0; $i < count($categories); $i++)
           
                    @if($categories[$i]->isCursoPosgrado == 1)
                       <div class="col-md-3 col-sm-12 mb-5 mt-5" style="max-height:350px;height: 75% !important;" >
                           <div class="card h-100 wow bounceInLeft"  data-wow-delay="{{$delay}}s">
                           <img class="card-img-top h-50 d-block d-sm-none px-4" style="width:100%" src="{{$categories[$i]['Image_URL']}}" alt="Card image cap">                               
                               <img class="card-img-top  d-none d-md-block"  src="{{$categories[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text h5-responsive" style="height: 12% !important; min-height:30px;font-size:1rem; "  >{{$categories[$i]['Categoria']}}</h5>
                                   <div class="expandable card-text mb-5" style="height: 8% !important; font-size:0.75rem;min-height:30px;">
                                        <p>{{$categories[$i]['Descripcion']}}</p>
                                   </div>
                                   
                                   <a class="card-text float-right  font-weight-bold " href="{{route('cursos.categorias',$categories[$i]['Categoria'])}}" >VER MAS</a>                                
                                   <!-- <a class="btn blue darken-3 btn-sm float-right text-white">Conoce más</a> -->
                               </div>
                           </div>
                       </div>

                       @php $delay=$delay+0.5; @endphp
                      @endif                     
            @endfor               
             </div>

            

             <h2 class="h2-responsive mt-5 text-black-50 wow pulse"> Posgrados </h2>
               
               <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
            @php $delay=0; @endphp
            @for ($i = 0; $i < count($categories); $i++)
           
                    @if($categories[$i]->isCursoPosgrado == 0)
                   
                       <div class="col-md-3 col-sm-12 mb-5 mt-2" style="max-height:350px; height: 75% !important;" >
                           <div class="card h-100 wow bounceInLeft" data-wow-delay="{{$delay}}s">
                               <img class="card-img-top h-50" style="max-height:175px" src="{{$categories[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text h5-responsive" style="height: 12% !important; min-height:30px;font-size:1rem;" >{{$categories[$i]['Categoria']}}</h5>
                                   <div class="expandable card-text mb-5" style="height: 8% !important; font-size:0.75rem;min-height:30px;">
                                        <p>{{$categories[$i]['Descripcion']}}</p>
                                   </div>
                                   <a class="card-text float-right font-weight-bold" href="{{route('cursos.categorias',$categories[$i]['Categoria'])}}" >VER MAS</a>
    
                               </div>
                           </div>
                       </div>
                       @php $delay=$delay+0.5; @endphp
                      @endif                     
            @endfor               
             </div>
             </div >
             </section>
             <div class="blue darken-4 ">
                <section class="container pb-4">
                    <div class="d-flex align-items-center justify-content-center  flex-column wow zoomIn"    style="min-height:225px; ">
                        <div class="row mb-4 " >
                            <div class="col-sm-12 col-md-4 text-center white-text mt-4" >
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
                </section>
            </div>
            <section class="container pb-4">
             
                <h2 class="h2-responsive mt-4 text-black-50 wow pulse"> Maestrías </h2>
               
            <hr class=" mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn" data-wow-duration="3s">
            @php $delay=0; @endphp
            @for ($i = 0; $i < count($courses); $i++)
                             
                         <div class="col-md-3 col-sm-12 mb-5 mt-2"  style="max-height:350px;height: 75% !important;" >
                           <div class="card h-100 wow bounceInLeft"  data-wow-delay="{{$delay}}s" >
                               <img class="card-img-top h-50" style="max-height:175px" src="{{$courses[$i]->Image_URL}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title primary-text h5-responsive" style="height: 12% !important; min-height:30px;font-size:1rem;"  >{{$courses[$i]->NombreCurso}}</h5>
                     
                                   <div class="expandable card-text mb-5" style="height: 8% !important; font-size:0.75rem;min-height:30px;">
                                        <p>{{$courses[$i]->Desc_Publicidad}}</p>
                                   </div>
                                   <a class="card-text float-right font-weight-bold" href="{{route('cursos.cursodetalle')}}/{{$courses[$i]->NombreCurso}}" >VER MAS</a>
                                  

                                   <!-- <a class="btn blue darken-3 btn-sm float-right text-white">Conoce más</a> -->
                               </div>
                           </div>
                       </div>
                       @php $delay=$delay+0.5; @endphp
            @endfor               
             </div>

               

        </section>
        
</div>

<div class="d-flex align-items-center justify-content-center flex-column "  style="min-height:575px; background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url('{{route('cursos.index')}}/img/b_1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="wow zoomIn">
        <!-- <img src="/img/b.jpg" class="w-md-100 h-100"/>         -->
        <h1 class="h1-responsive text-white text-center mt-4">¿Por qué estudiar con nosotros?</h1>
        <p class="text-white text-center">Contamos con las mejores metodologías de enseñanza virtual, docentes calificados y una amplia gama de recursos mediáticos para facilitar el proceso enseñanza-aprendizaje</p>

        <section class="container pt-4">
           
            <!--Grid row-->
            <div class="row wow fadeIn " data-wow-duration="3s">
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
            </div>
            <!--/Grid row-->
        </section>
        <!--Section: Main features & Quick Start-->
</div>
    
    <div class="white">
        <div class=" container pt-2 ">
        <h1 class=" h1-responsive  pt-5 w-100 text-center wow zoomIn">Empresas que confían en nuestro trabajo</h1>
            <div class="d-block d-sm-none">
                <div class="d-flex align-items-center justify-content-center flex-column " >

                    <img src="{{URL::asset('img/Resources/empresas/BAC.jpg')}}" class="wow jackInTheBox"/>       
                    <img src="{{URL::asset('img/Resources/empresas/BDF.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/CARGILL.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/CEMEX.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/LA-PRENSA.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/MINED.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/MTI.jpg')}}" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/NIMAC.jpg')}}" class="wow jackInTheBox"/>                       
                
                </div>
             </div>
             <div class="d-none d-md-block">
                <div class=" d-flex align-items-center justify-content-center row wow fadeIn" >

                    <img src="{{URL::asset('img/Resources/empresas/BAC.jpg')}}" style="width:200px" class="wow jackInTheBox"/>       
                    <img src="{{URL::asset('img/Resources/empresas/BDF.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/CARGILL.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/CEMEX.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/LA-PRENSA.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/MINED.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/MTI.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                    <img src="{{URL::asset('img/Resources/empresas/NIMAC.jpg')}}" style="width:200px" class="wow jackInTheBox"/>                       
                </div>
            </div>
        </div>
    </div>
        <div class="grey lighten-4">
            <div class="d-flex align-items-center justify-content-center flex-column wow zoomIn" style="min-height:220px; ">
                    <h1 class="h1-responsive text-black-50 text-center ">Lo que opinan de nuestros estudiantes</h1>
                    <p class="text-black-50 text-center">Se parte de nuestra comunidad, y logra el éxito a través del aprendizaje en línea</p>
            </div>
            <div class="container ">
                <section>
                    <!--First row-->
                    <div class="row features-small pb-3 wow fadeIn" data-wow-duration="3s">
                                    <section class="carousel slide col-12 d-block d-sm-none" data-ride="carousel" id="carousel-cursossm">
                                        <div class="container" style="position: absolute; z-index: 99998; margin-top:15%">
                                            <div class="d-flex " >
                                                <div class="mr-auto" style="margin-left:-5%" >
                                                        <a class="btn white btn-circle" href="#carousel-cursossm" role="button" data-slide="prev">
                                                        <i class="fa fa-chevron-left center-ico-button grey-text " aria-hidden="true"></i>                                            
                                                    </a>
                                                </div>
                                                <div class="ml-auto " style="margin-right:3%">
                                                    <a class="btn white btn-circle" href="#carousel-cursossm" role="button" data-slide="next">
                                                    <i class="fa fa-chevron-right center-ico-button grey-text" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container pt-0 mt-2 mb-5  ">
                                            <div class="carousel-inner">
                                            @php $contador = 0;@endphp

                                                @while($contador < count($comentarios))
                                                    @if($contador==0)
                                                        <div class="carousel-item active">
                                                    @else
                                                        <div class="carousel-item">
                                                    @endif

                                                    <div class="card-deck h-100 mb-2 " style="max-height:375px">
                                                    @php $tres = 1+$contador;@endphp
                                                    @for ($i = $contador; ($i < count($comentarios) && $i < $tres ); $i++)
                                                        <div class="card h-100 " style="max-height:375px" >                                                
                                                            <div class="card-body pt-2" >
                                                            <div class="d-flex justify-content-center">
                                                                <img class="img-fluid rounded-circle"  style="max-height:150px; max-weight:150px" src="{{$comentarios[$i]['Image_URL']}}" alt="comentario {{$comentarios[$i]['Nombre']}}">
                                                            </div><br>
                                                                <a
                                                                class="card-title text-center" >{{$comentarios[$contador]['Nombre']}}
                                                                </a> <br>
                                                                
                                                                <p class="card-text font-italic" style="min-height:80px">"{{$comentarios[$contador]['Comentario']}}"</p>
                                                                <hr>
                                                                <a class="card-meta"></a>
                                                                <p class="card-meta float-right" style="font-size:12;height:50px">{{$comentarios[$contador]['Profesion']}} - {{$comentarios[$contador]['Desc_Pais']}}</p>                                            
                                                            </div>            
                                                        </div>
                                                        @php $contador++; @endphp
                                                    @endfor
                                               
                                                    </div>
                                                </div>
                                                
                                                @endwhile
                                            
                                                
                                                
                                        </div>
                                        </div>
                                    </section>
                                    <section class="carousel slide col-12 d-none d-md-block" data-ride="carousel" id="carousel-cursosmd">
                                        <div class="container" style="position: absolute; z-index: 99998; margin-top:15%">
                                            <div class="d-flex " >
                                                <div class="mr-auto" style="margin-left:-30px" >
                                                        <a class="btn white btn-circle" href="#carousel-cursosmd" role="button" data-slide="prev">
                                                        <i class="fa fa-chevron-left center-ico-button grey-text " aria-hidden="true"></i>                                            
                                                    </a>
                                                </div>
                                                <div class="ml-auto " style="margin-right:10px">
                                                    <a class="btn white btn-circle" href="#carousel-cursosmd" role="button" data-slide="next">
                                                    <i class="fa fa-chevron-right center-ico-button grey-text" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container pt-0 mt-2 mb-5 ">
                                            <div class="carousel-inner">
                                            @php $contador2 = 0;@endphp

                                                @while($contador2 < count($comentarios))
                                                    @if($contador2==0)
                                                        <div class="carousel-item active">
                                                    @else
                                                        <div class="carousel-item">
                                                    @endif

                                                    <div class="card-deck h-100 mb-2" style="max-height:375px">
                                                    @php $tres = 3+$contador2;@endphp
                                                    @for ($i = $contador2; ($i < count($comentarios) && $i < $tres ); $i++)
                                                        <div class="card h-100 " style="max-height:375px" >                                                
                                                            <div class="card-body pt-2" >
                                                            <div class="d-flex justify-content-center">
                                                                <img class="img-fluid rounded-circle"  style="max-height:150px; max-weight:150px" src="{{$comentarios[$i]['Image_URL']}}" alt="comentario {{$comentarios[$i]['Nombre']}}">
                                                            </div><br>
                                                                <a
                                                                class="card-title text-center" >{{$comentarios[$contador2]['Nombre']}}
                                                                </a> <br>
                                                                
                                                                <p class="card-text font-italic" style="min-height:100px">"{{$comentarios[$contador2]['Comentario']}}"</p>
                                                                <hr>
                                                                <a class="card-meta"></a>
                                                                <p class="card-meta float-right" style="font-size:12;height:50px">{{$comentarios[$contador2]['Profesion']}} - {{$comentarios[$contador2]['Desc_Pais']}}</p>                                            
                                                            </div>            
                                                        </div>
                                                        @php $contador2++; @endphp
                                                    @endfor
                                                    @if(count($comentarios)%3!=0 && $contador2 == count($comentarios))   
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
                            $('#btnsearchcarruselsm').click(function(){
                    
                                        
                                var searchcarruselsm = $( "#searchcarruselinputsm").val();
                                if( searchcarrusel.length > 0){
                                    window.location.href  = "{{route('cursos.searchroute')}}/"+searchcarruselsm;
                                }
                            });

                        var inputentercarruselsm = document.getElementById("searchcarruselinputsm");
                        inputentercarruselsm.addEventListener("keyup", function(event) {
                                event.preventDefault();
                                if (event.keyCode === 13) {
                                    document.getElementById("btnsearchcarruselsm").click();
                                }
                            });

                            $('#btnsearchcarruselmd').click(function(){
                    
                                        
                            var searchcarruselmd = $( "#searchcarruselinputmd").val();
                            if( searchcarruselmd.length > 0){
                                window.location.href  = "{{route('cursos.searchroute')}}/"+searchcarruselmd;
                            }
                        });

                    var inputentercarruselmd = document.getElementById("searchcarruselinputmd");
                    inputentercarruselmd.addEventListener("keyup", function(event) {
                            event.preventDefault();
                            if (event.keyCode === 13) {
                                document.getElementById("btnsearchcarruselmd").click();
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

        $('div.expandable p').expander({
            slicePoint: 70, // si eliminamos por defecto es 100 caracteres
            expandText: '', // por defecto es 'read more...'
            collapseTimer: 5000, // tiempo de para cerrar la expanción si desea poner 0 para no cerrar
            userCollapseText: '[Ocultar]' // por defecto es 'read less...'
        });

                    </script>
                    @endsection