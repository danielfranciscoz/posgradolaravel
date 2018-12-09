@extends('layout.app')
@section('title', $curso->NombreCurso)
@section('content')

<main class="">

<div class="d-flex align-items-center justify-content-center flex-column banner-degradado-1 " style="min-height:325px; ">
        <h1 class="h1-responsive text-white text-center font-weight-bold ">{{$curso->NombreCurso}} </h1>
        <p class="text-white text-justify">{{$curso->Desc_Publicidad}} </p>
</div>

<h5 class="">  </strong></h5>
    <div class="container" >
    <section class="mt-3 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8  container">
                <div class="row">
                            
                           <div class="card col-12 mb-4  white">
                        <!-- Card content -->
                            <div class="card-body">
                             <h4 class="h4-responsive"><strong>Lo que aprenderás</strong></h4> </br>
                                <div class="row">
                            

                                     @for($i=0;$i<count($curso->requisitos()->get());$i++)  
                                 
                                    <div class="col-md-6 mt-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        {{$curso->requisitos()->get()[$i]->Requisito}}                           
                                    </div>                                    
                                    @endfor
                                </div>

                            </div>

                            
                        </div>

                         <h4 class="h4-responsive mx-4 col-12"><strong>Contenido del Curso</strong></h4> </br>

                      
                        <div class="accordion w-100 mb-4" id="accordionExample">
                        @for($i=0;$i<count($curso->tematicas()->get());$i++)  
                            <div class="card z-depth-0 bordered white">
                                <div class="card-header w-100" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    {{$curso->tematicas()->get()[$i]->Tematica}}
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
                        @endfor                       
                        </div>
                    </div>
                    <h4 class="h4-responsive mx-4 col-12"><strong>Requisitos</strong></h4> 
                    </br>
                    @for($i=0;$i<count($curso->requisitos()->get());$i++)  
                        <li class="mx-5 px-4"> {{$curso->requisitos()->get()[$i]->Requisito}}</li>
                    @endfor
                    
                     <h4 class="h4-responsive mx-4 col-12 mt-4 "><strong>Descripción</strong></h4> 
                     </br>
                        <div class="text-justify ml-5 mb-4">
                        {{$curso->Desc_Introduccion}}
                        </div>
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
                    <div class="card pt-2 white">
                        <div class="card-body  px-4 pt-2">
                            <span><strong  style="font-size:2em">$ {{$precio->Precio}} </strong> <strike class="grey-text"  style="font-size:0.75em"> $ 12,45</strike></span>
                            <span class="grey-text"></br> 95 % de descuento</span>

                            <a class="btn btn-primary mt-4 w-100 mb-2" onclick="addcarrito({{$curso->id}})">Añadir al carrito</a>
                            <div class="alert alert-danger col-12" role="alert" id="alertaddcarrito">                            
                            </div>
                            <span class="black-text font-weight-bold"></br> Incluye</span>
                            <span class=""></br> 
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                           
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
                                Certificado
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


@section('endscript')
<script>
 
 
 $( "#alertaddcarrito").hide();
    function addcarrito(id){
        $.ajax({
            url: "../process/addcarrito",
            type : 'GET',
            data: {
                "curso" : id
            },
            success: function(data) {  
                if (data.message == "error") {
                    $( "#alertaddcarrito").show();
                    $( "#alertaddcarrito").html( "<p class='text-center'>"+data.error+"</p>" );
                   
                }else{
                   
                    setTimeout(function(){ location.reload(); }, 00);
                }
            }
        });

    }

    
</script>

@endsection