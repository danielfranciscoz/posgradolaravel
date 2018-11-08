


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
                  <img src="../img/b.jpg" class="w-md-100 h-100"/>
                  <div class=" d-flex justify-content-start align-items-center mask rgba-indigo-light white-text" style="max-height:600px">
                        <div class="col-lg-4 col-md-12">

            <!--Panel-->
                            <div class="card card-body white-text" style=" background-color:rgba( 255, 255,255, 0.1)">  
                                <h4 class="card-text black-text text-justify  white-text"  > "La enseñanza que deja huella no es la que se hace de cabeza a cabeza, sino de corazón a corazón" </h4>                          
                              <p class="card-text white-text"> 
                                  Howard G. Hendricks
                              </p>
                              <div class="input-group md-form form-sm form-2 pl-0">
                              <input class="form-control my-0 py-1 red-border" type="text" placeholder="¿Qué deseas Aprender?" aria-label="Search">
                              <div class="input-group-append">
                                <span class="input-group-text btn-primary white-text " id="basic-text1"><i class="fa fa-search white-text" aria-hidden="true"></i></span>
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
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>

<main>
    <div class="container">
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
                
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @for ($i = 0; $i < count($categorias); $i++)
                        @if ($i === 0)
                        <li class="nav-item">
                            <a class="nav-link grey-text active" id="{{$categorias[$i]['Categoria']}}-tab" data-toggle="tab" href="#{{$categorias[$i]['Categoria']}}-panel" role="tab" aria-controls="{{$categorias[$i]['Categoria']}}" aria-selected="true">{{$categorias[$i]['Categoria']}}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link grey-text" id="{{$categorias[$i]['Categoria']}}-tab" data-toggle="tab" href="#{{$categorias[$i]['Categoria']}}-panel" role="tab" aria-controls="{{$categorias[$i]['Categoria']}}" aria-selected="true">{{$categorias[$i]['Categoria']}}</a>
                        </li>
                        @endif
                       
                                    
                      @endfor
                      
                     
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="Desarrollo-panel" role="tabpanel" aria-labelledby="home-tab">
                            <section class="carousel slide" data-ride="carousel" id="carousel-cursos">
                            <div class="container" style="position: absolute; z-index: 99998; margin-top:23%">
                                <div class="d-flex " >
                                    <div class="mr-auto" style="margin-left:-30" >
                                            <a class="btn white btn-circle" href="#carousel-cursos" role="button" data-slide="prev">
                                            <i class="fa fa-chevron-left center-ico-button grey-text " aria-hidden="true"></i>                                            
                                        </a>
                                    </div>
                                    <div class="ml-auto " style="margin-right:-30">
                                        <a class="btn white btn-circle" href="#carousel-cursos" role="button" data-slide="next">
                                        <i class="fa fa-chevron-right center-ico-button grey-text" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="container pt-0 mt-2">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card-deck">
                                        <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
          
                                                <a
                                                 class="card-title font-weight-bold" >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
        
                                        </div>
                                        <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
           
                                                <a
                                                 class="card-title font-weight-bold"  >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
         
                                        </div> <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
            
                                                <a
                                                 class="card-title font-weight-bold"  >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
          
                                        </div>
                                    </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card-deck">
                                        <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
            
                                                <a
                                                 class="card-title font-weight-bold"  >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
          
                                        </div> 
                                        <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
            
                                                <a
                                                 class="card-title font-weight-bold" >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
                            
          
                                        </div>

                                        <div class="card h-100" >
                                            <div class="card-img-top card-img-top-250">
                                                <img class="w-100" src="/img/Resources/test_img_0.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
            
                                                <a
                                                 class="card-title font-weight-bold"  >Node: De Cero a Experto
                                                </a> <br></br>
                                                
                                                <p class="card-text">Msc.Anna Fernanda</p>                                               
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike style="font-size:12"> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
                            
          
                                        </div>

                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                     
                     </div>
                      <div class="tab-pane fade" id="Diseño-panel" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
                    </div>
                  
                </div>
               
            </div>
           
        </section> -->
        <hr class="my-5">
        <section>
            <h3 class="h3 text-center mb-5">Nuestras Categorias de Cursos</h3>
            <!--Grid row-->
            <div class="row wow fadeIn">
               
            @for ($i = 0; $i < count($categorias); $i++)
                    
                       <div class="col-md-3 col-sm-12 mt-5">
                           <div class="card h-100" style="max-height:400px">
                               <img class="card-img-top" src="{{$categorias[$i]['Image_URL']}}" alt="Card image cap">
                               <div class="card-body">
                                   <h5 class="card-title">{{$categorias[$i]['Categoria']}}</h5>
                                   <p class="card-text">{{$categorias[$i]['Descripcion']}}</p>
                                   <a class="card-text float-right" href="{{route('cursos.categorias',$categorias[$i]['Categoria'])}}" >Conoce más></a>
                                  
                               </div>
                           </div>
                       </div>
                                           
            @endfor               
             </div>

               

        </section>
        <hr class="my-5">
      
        <section>
            <h3 class="h3 text-center mb-5">¿Por qué estudiar con nosotros?</h3>
            <!--Grid row-->
            <div class="row wow fadeIn">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-calendar fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Conveniencia</h5>
                            <p class="grey-text">Acceso 24 horas al día para que aprendas a tu propio ritmo y en español</p>
                        </div>
                    </div>
                    <!--/First row-->
                    <div style="height:30px"></div>
                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-users fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Confianza</h5>
                            <p class="grey-text">
                            Apoyo privado de tutores online y videochat ‘Tutor Café’ para debatir temas en grupo
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->
                    <div style="height:30px"></div>
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-line-chart fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Calidad</h5>
                            <p class="grey-text">
                            Cursos online desarrollados por líderes de la industria. 
                            </p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <div class="col-lg-6 col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-map-o fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Experiencia</h5>
                            <p class="grey-text">Cientos de horas de ejercicios reales con las que puedes crear o enriquecer tu portafolio. </p>
                        </div>
                    </div>
                    <!--/First row-->
                    <div style="height:30px"></div>
                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-mortar-board fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Respaldo</h5>
                            <p class="grey-text">
                                Certificados con aplicaciones internacionales y validez en LinkedIn. 
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->
                    <div style="height:30px"></div>
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-thumbs-o-up fa-2x primary-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Facilidad</h5>
                            <p class="grey-text">
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
        <hr class="my-5">
        <!--Section: Not enough-->
        <section>
       
            <h2 class="my-5 h3 text-center">¿Qué dicen nuestros Estudiantes?</h2>
            <!--First row-->
            <div class="row features-small mb-5 mt-3 wow fadeIn">
                <!--First column-->
                @for ($i = 0; $i < count($comentarios); $i++)
                <div class="col-md-4 mt-4">
                    <div class="card h-100 " style="max-height:400px">
                        <div class="card-body text-center">
                                    <p><img class=" img-fluid rounded-circle" src="{{$comentarios[$i]['Image_URL']}}" alt="card image" style="height:100px"></p>
                                    <h4 class="card-title">{{$comentarios[$i]['Nombre']}}</h4>
                                    <p class="card-text">“{{$comentarios[$i]['Comentario']}}”.</p>
                                    <p class="card-text text-black">{{$comentarios[$i]['Profesion']}} - {{$comentarios[$i]['Desc_Pais']}}</p>
                        </div>
                     </div>
                   
                </div>
                
               @endfor
              
            </div>
            <!--/First row-->
        </section>
        <!--Section: Not enough-->
        <hr class="mb-5">
        <!--Section: More-->
      
        <!--Section: More-->
    </div>
</main>
@endsection

<script>
$('.carousel-example-2').carousel()
    </script>