


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
        <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
                <!--Mask-->
                <div class="view">
                  <!--Video source-->
                  <!-- <video autoplay="" loop="" playsinline="">
                      <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4">
                  </video> -->
                  <!-- Carousel content -->
                  <div class=" d-flex justify-content-start align-items-center mask rgba-indigo-light white-text">
                        <div class="col-lg-4 col-md-12">

            <!--Panel-->
                            <div class="card card-body" style="">  
                                <h4 class="card-text black-text text-justify" > "La enseñanza que deja huella no es la que se hace de cabeza a cabeza, sino de corazón a corazón" </h4>                          
                              <p class="card-text black-text"> 
                                  Howard G. Hendricks
                              </p>
                              <div class="input-group md-form form-sm form-2 pl-0">
                              <input class="form-control my-0 py-1 red-border" type="text" placeholder="¿Que deseas Aprender?" aria-label="Search">
                              <div class="input-group-append">
                                <span class="input-group-text btn-primary text-grey " id="basic-text1"><i class="fa fa-search white-text" aria-hidden="true"></i></span>
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
        <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-4 mb-4  d-flex align-items-center ">

                 <div>  
                                <p class="font-weight-bold">La selección de cursos más amplia del pais </p>                     
                              <p> 
                                Elige entre más de 300 cursos con nuevo contenido cada mes
                              </p>
                             
                </div>

                    
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="Desarrollo-tab" data-toggle="tab" href="#Desarrollo-panel" role="tab" aria-controls="Desarrollo" aria-selected="true">Desarrollo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Diseño-tab" data-toggle="tab" href="#Diseño-panel" role="tab" aria-controls="Diseño" aria-selected="false">Diseño</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Negocios-tab" data-toggle="tab" href="#Negocios-panel" role="tab" aria-controls="Negocios" aria-selected="false">Negocios</a>
                      </li>
                       <li class="nav-item">
                        <a class="nav-link" id="Informatica-tab" data-toggle="tab" href="#Informatica-panel" role="tab" aria-controls="Informatica" aria-selected="false">Informatica</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="Desarrollo-panel" role="tabpanel" aria-labelledby="home-tab">
                            <section class="carousel slide" data-ride="carousel" id="carousel-cursos">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-md-right lead">
                                        <a class="btn btn-outline-primary prev-cursos" href="" title="Atras"><i class="fa fa-lg fa-chevron-left"></i></a>
                                        <a class="btn btn-outline-primary  next-cursos" href="" title="Adelante"><i class="fa fa-lg fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="container pt-0 mt-2">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card-deck">
                                        <div class="card h-100">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="http://i.imgur.com/EW5FgJM.png" alt="Carousel 1">
                                            </div>
                                             <div class="card-body pt-2" >
            <!--Title-->
                                                <a
                                                 class="card-title font-weight-bold">Node: De Cero a Experto
                                                </a> <br></br>
                                                <!--Text-->
                                                <p class="card-text">Anna Fernanda</p>
                                                <hr>
                                                <a class="card-meta"></a>
                                                <p class="card-meta float-right"><strike> $2500 </strike>  <strong>$ 110 </strong></p>
                                              </div>
          <!--Card content-->
                                        </div>
                                        <div class="card h-100">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="http://i.imgur.com/Hw7sWGU.png" alt="Carousel 2">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h6 class="small text-wide p-b-2">Development</h6>
                                                <h2>
                                                    <a href="">How to Make Every Line Count.</a>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="card h-100">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="http://i.imgur.com/g27lAMl.png" alt="Carousel 3">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h6 class="small text-wide p-b-2">Design</h6>
                                                <h2>
                                                    <a href="">Responsive is Essential.</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card-deck">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="//visualhunt.com/photos/l/1/office-student-work-study.jpg" alt="Carousel 4">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h6 class="small text-wide p-b-2">Another</h6>
                                                <h2>
                                                    <a href="">Tagline or Call-to-action.</a>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="//visualhunt.com/photos/l/1/working-woman-technology-computer.jpg" alt="Carousel 5">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h6 class="small text-wide p-b-2"><span class="pull-xs-right">12.04</span> Category 1</h6>
                                                <h2>
                                                    <a href="">This is a Blog Title.</a>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img class="img-fluid" src="//visualhunt.com/photos/l/1/people-office-team-collaboration.jpg" alt="Carousel 6">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h6 class="small text-wide p-b-2">Category 3</h6>
                                                <h2>
                                                    <a href="">Catchy Title of a Blog Post.</a>
                                                </h2>
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
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Main info-->
        <hr class="my-5">
        <!--Section: Main features & Quick Start-->
        <section>
            <h3 class="h3 text-center mb-5">About MDB</h3>
            <!--Grid row-->
            <div class="row wow fadeIn">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-code fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Bootstrap 4</h5>
                            <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
                        </div>
                    </div>
                    <!--/First row-->
                    <div style="height:30px"></div>
                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-book fa-2x blue-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Detailed documentation</h5>
                            <p class="grey-text">
                                We give you detailed user-friendly documentation at your disposal. It will help you to implement your ideas
                                easily.
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->
                    <div style="height:30px"></div>
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Lots of tutorials</h5>
                            <p class="grey-text">
                                We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                                how to use MDB as well as other technologies.
                            </p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-lg-6 col-md-12">
                    <p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ" allowfullscreen></iframe>
                    </div>
                </div>
                <!--/Grid column-->
            </div>
            <!--/Grid row-->
        </section>
        <!--Section: Main features & Quick Start-->
        <hr class="my-5">
        <!--Section: Not enough-->
        <section>
            <h2 class="my-5 h3 text-center">Not enough?</h2>
            <!--First row-->
            <div class="row features-small mb-5 mt-3 wow fadeIn">
                <!--First column-->
                <div class="col-md-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Free for personal and commercial use</h6>
                            <p class="grey-text">
                                Our license is user-friendly. Feel free to use MDB for both private as well as commercial projects.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/First row-->
                    <!--Second row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">400+ UI elements</h6>
                            <p class="grey-text">
                                An impressive collection of flexible components allows you to develop any project.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Second row-->
                    <!--Third row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">600+ icons</h6>
                            <p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Third row-->
                    <!--Fourth row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Fully responsive</h6>
                            <p class="grey-text">
                                It doesn't matter whether your project will be displayed on desktop, laptop, tablet or mobile phone. MDB
                                looks great on each screen.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Fourth row-->
                </div>
                <!--/First column-->
                <!--Second column-->
                <div class="col-md-4 flex-center">
                    <img src="https://mdbootstrap.com/img/Others/screens.png" alt="MDB Magazine Template displayed on iPhone" class="z-depth-0 img-fluid">
                </div>
                <!--/Second column-->
                <!--Third column-->
                <div class="col-md-4 mt-2">
                    <!--First row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">70+ CSS animations</h6>
                            <p class="grey-text">
                                Neat and easy to use animations, which will increase the interactivity of your project and delight your visitors.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/First row-->
                    <!--Second row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Plenty of useful templates</h6>
                            <p class="grey-text">Need inspiration? Use one of our predefined templates for free.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Second row-->
                    <!--Third row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Easy installation</h6>
                            <p class="grey-text">
                                5 minutes, a few clicks and... done. You will be surprised at how easy it is.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Third row-->
                    <!--Fourth row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Easy to use and customize</h6>
                            <p class="grey-text">
                                Using MDB is straightforward and pleasant. Components flexibility allows you deep customization. You will
                                easily adjust each component to suit your needs.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Fourth row-->
                </div>
                <!--/Third column-->
            </div>
            <!--/First row-->
        </section>
        <!--Section: Not enough-->
        <hr class="mb-5">
        <!--Section: More-->
        <section>
            <h2 class="my-5 h3 text-center">...and even more</h2>
            <!--First row-->
            <div class="row features-small mt-5 wow fadeIn">
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2 pl-3">
                            <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
                            <p class="grey-text mt-2">
                                Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all browsers; all browsers love MDB.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-level-up fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
                            <p class="grey-text mt-2">
                                MDB becomes better every month. We love the project and enhance as much as possible.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-comments-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Active community</h5>
                            <p class="grey-text mt-2">
                                Our society grows day by day. Visit our forum and check how it is to be a part of our family.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
                            <p class="grey-text mt-2">
                                MDB is integrated with newest jQuery. Therefore you can use all the latest features which come along with
                                it.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
            </div>
            <!--/First row-->
            <!--Second row-->
            <div class="row features-small mt-4 wow fadeIn">
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Modularity</h5>
                            <p class="grey-text mt-2">
                                Material Design for Bootstrap comes with both, compiled, ready to use libraries including all features as
                                well as modules for CSS (SASS files) and JS.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Technical support</h5>
                            <p class="grey-text mt-2">
                                We care about reliability. If you have any questions - do not hesitate to contact us.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Flexbox</h5>
                            <p class="grey-text mt-2">MDB fully supports Flex Box. You can forget about alignment issues.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-file-code-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">SASS files</h5>
                            <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile them.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->
            </div>
            <!--/Second row-->
        </section>
        <!--Section: More-->
    </div>
</main>
@endsection

