@extends('layout.app')
@section('title', $curso)
@section('content')

<main class="white">

<div class="d-flex align-items-center justify-content-center flex-column banner-degradado-1 " style="min-height:325px; ">
        <h1 class="h1-responsive text-white text-center ">{{$curso}} </h1>
        <p class="text-white text-justify">Aprende PHP desde cero, bases de datos, SQL, MySQL, POO, MVC, Librerías, Laravel 5, Symfony4, WordPress y más. +56 horas </p>
</div>

<h5 class="">  </strong></h5>
    <div class="container" >
    <section class="mt-3 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 container">
                <div class="row">
                            
                           <div class="card col-12 grey lighten-4 mb-4 ">
                        <!-- Card content -->
                            <div class="card-body">
                             <h4 class="h4-responsive"><strong>Lo que aprenderás</strong></h4> </br>
                                <div class="row">
                                    <div class="col-md-6 mt-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        Desarrollar aplicaciones web con Laravel                                    
                                    </div>

                                    <div class="col-md-6 mt-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        Desarrollar aplicaciones web con Laravel                                    
                                    </div>

                                    <div class="col-md-6 mt-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        Desarrollar aplicaciones web con Laravel                                    
                                    </div>

                                    <div class="col-md-6 mt-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        Desarrollar aplicaciones web con Laravel                                    
                                    </div>
                                    
                                </div>

                            </div>

                            
                        </div>

                         <h4 class="h4-responsive mx-4 col-12"><strong>Contenido del Curso</strong></h4> </br>

                    <div class="accordion w-100 mb-4" id="accordionExample">
                    <div class="card z-depth-0 bordered">
                        <div class="card-header w-100" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Introduccion al Laravel
                            </button>
                        </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table  w-100">
                    
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Validación de formularios (segunda parte)</td>
                        <td>8 h</td>
                        
                        </tr>
                        <tr>
                        <th scope="row">1</th>
                        <td>Validación de formularios (segunda parte)</td>
                        <td>8 h</td>
                        </tr>
                        <tr>
                        <th scope="row">1</th>
                        <td>Validación de formularios (segunda parte)</td>
                        <td>8 h</td>
                        </tr>
                    </tbody>
                    </table>
                        </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                            labore sustainable.
                        </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                            labore sustainable.
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <h4 class="h4-responsive mx-4 col-12"><strong>Requisitos</strong></h4> 
                    </br>
                    <li class="mx-5 px-4">Saber usar un sistema operativo</li>
                    <li class="mx-5 px-4">Saber usar un sistema operativo</li>
                    <li class="mx-5 px-4">Saber usar un sistema operativo</li>
                     <h4 class="h4-responsive mx-4 col-12 mt-4 "><strong>Descripción</strong></h4> 
                     </br>
                     <div class="text-justify ml-5 mb-4">Bienvenido al Máster en PHP, en el que aprenderemos todo lo necesario para dominar el lenguaje de programación del lado del servidor(backend) más popular en la actualidad y todas las tecnologías a su alrededor con más futuro y demanda laboral.</div>
                     <h4 class="h4-responsive mx-4 col-12 mt-4 "><strong>Acerca del instructor</strong></h4> 
                     </br>
                     <div class="row ml-4">
                        <div class="col-md-3 col-sm-12">
                            <img src="https://udemy-images.udemy.com/user/200_H/16661812_b24c.jpg" class="img-fluid  rounded-circle" />
                        </div>
                        <div class="col-md-9 col-sm-12">
                        <div class="font-weight-bold blue-text mb-2">
                               Victor Robleto 
                            </div>
                            <div class="font-weight-bold mb-2">
                                Desarrollador web
                            </div>
                            <div class="text-justify mb-5">
                            Soy desarrollador web en una empresa y llevo inmerso en el mundo de la programación y la informática desde los 15 años. Me encanta programar y todo lo relacionado con Internet y las nuevas tecnologías, crear cosas y enseñar a los demás. Soy casi completamente autodidacta, por eso voy a ofrecerte muchos de mis conocimientos para que tú puedas aprender más fácilmente y más rápido de lo que yo lo hice y hago cada día. Puedes saber más de mí en mi blog victorroblesweb y en mis perfiles en las diferentes redes sociales ;) .

                            </div>
                         
                         </div>
                     </div>




                </div>
                <div class="col-md-4  container mb-4 ">
                    <div class="card pt-2 ">
                        <div class="card-body  px-4 pt-2">
                            <span><strong  style="font-size:2em"> $ 9,99 </strong> <strike class="grey-text"  style="font-size:0.75em"> $ 12,45</strike></span>
                            <span class="grey-text"></br> 95 % de descuento</span>

                            <a class="btn btn-primary mt-4 w-100 mb-2">Añadir al carrito</a>
                            <span class="black-text font-weight-bold"></br> Incluye</span>
                            <span class=""></br> 
                                <i class="fa fa-eye grey-text" aria-hidden="true"></i>
                                56 horas de Estudio
                            </span>
                            <span class=""></br> 
                                <i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                                Recursos Descargables
                            </span>
                            <span class=""></br> 
                                <i class="fa fa-hand-o-right grey-text" aria-hidden="true"></i>
                                 Acceso de por vida
                            </span>
                            <span class=""></br> 
                                <i class="fa fa-mobile-phone grey-text" aria-hidden="true"></i>
                                Acceso en dispositivos móviles y TV
                            </span>
                            <span class=" "></br> 
                                <i class="fa fa-certificate grey-text" aria-hidden="true"></i>
                                Certificado de finalización
                                </br>
                            </span>
                            <div class="mt-4 d-flex justify-content-center grey-text">
                                <i class="fa fa-cc-visa fa-3x mx-1" aria-hidden="true"></i>
                                <i class="fa fa-cc-amex fa-3x mx-1" aria-hidden="true"></i>
                                <i class="fa fa-cc-mastercard fa-3x mx-1" aria-hidden="true"></i>
                            </div>
                        </div>
                   </div>
                </div>
    </div>
</main>
@endsection



