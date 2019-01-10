@extends('layout.app')
@section('title', $curso->NombreCurso)
@section('content')
@php
    $banner;
    $tipo;
   
    if($curso->categoria==null){
            $banner = "banner-maestria";
            $tipo = "Maestría";
    }else{
        if($curso->categoria->isCursoPosgrado==1){
            $banner = "banner-curso";
            $tipo = "Curso de Especialización";
        }
        if($curso->categoria->isCursoPosgrado==0){
            $banner = "banner-posgrado";
            $tipo = "Posgrado";
        }
    }


@endphp

<main class="">

<div class=" {{$banner}} " >

    <div class="d-flex align-items-center justify-content-center flex-column " style="min-height:325px;background: url('{{route('cursos.index')}}/img/Papel tapiz/t.svg');">
            <h1 class="h1-responsive text-white text-center font-weight-bold ">{{$curso->NombreCurso}} </h1>
            <p class="text-white text-justify">{{$curso->Desc_Publicidad}} </p>
    </div>
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

                            <h4 class="h4-responsive mx-4 mt-4 "><strong>Descripción @if($tipo=='Maestría')de la @else del @endif{{$tipo}}</strong></h4> 
                             </br>
                                <div class="text-justify ml-5 mb-4">
                                {{$curso->Desc_Introduccion}}
                                </div>
                             <h4 class="h4-responsive mx-4"><strong>Requisitos</strong></h4> </br>
                                <div class="row mx-4">
                            

                                     @for($i=0;$i<count($curso->requisitos()->get());$i++)  
                                 
                                    <div class="col-md-6 mb-2  ">
                                        <i class="fa fa-check grey-text" aria-hidden="true"></i>
                                        
                                        {{$curso->requisitos()->get()[$i]->Requisito}}                           
                                    </div>                                    
                                    @endfor
                                </div>

                            </div>

                            
                        </div>
                        <div class="card col-12 mb-4  white">

                            <h4 class="h4-responsive mx-4 font-weight-bold mt-4">
                                
                            Contenido </h4> </br>
                                <table class="table table-borderless table-hover mx-4">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="font-weight-bold"><i class="fa fa-hashtag" aria-hidden="true"></i></th>
                                            <th scope="col" class="font-weight-bold"><i class="fa fa-pencil" aria-hidden="true"></i> Tema</th>
                                            <th scope="col" class="font-weight-bold"><i class="fa fa-clock-o" aria-hidden="true"></i> Horas</th>
                                       
                                        </tr>
                                    </thead>
                                    <tbody>                            
                                        @for($i=0;$i<count($curso->tematicas()->get());$i++) 
                                        <tr>
                                            <th scope="row" class="font-weight-bold">{{$i+1}}</th>
                                            <th>{{$curso->tematicas()->get()[$i]->Tematica}}</th>                                          
                                            <th>{{$curso->tematicas()->get()[$i]->Duracion}}</th>
                                            
                                        </tr> 
                                        @endfor
                                    </tbody>
                                </table>

                        </div>
                        <!-- -->
                    
                  
                    
                     @if(count($curso->docentes()->get())>0)
                    <div class="card col-12 mb-4  white">
                       @if(count($curso->docentes()->get())==1)
                        <h4 class="h4-responsive mx-4  mt-4 font-weight-bold mb-4">Acerca del instructor</h4> 
                        @else
                        <h4 class="h4-responsive mx-4  mt-4 font-weight-bold mb-4">Acerca de los instructores</h4> 
                        @endif
                     </br>
                    
                     <div class="row mx-4">
                        
                      
                            @for($i=0;$i<count($curso->docentes()->get());$i++)  
                             <div class="row   ">
                                            <div class="col-md-3 col-sm-12 ">
                                                <img src="{{route('cursos.index')}}/{{$curso->docentes()->get()[$i]->Image_URL}}" class="img-fluid rounded-circle" />
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <div class="font-weight-bold primary-text" >
                                                    <h5 class="h5-responsive">{{$curso->docentes()->get()[$i]->Nombres}}</h5>
                                                </div>
                                                <div class="font-weight-bold mb-2">
                                                    {{$curso->docentes()->get()[$i]->Profesion}}
                                                </div>
                                                <div class="text-justify mb-5 ">
                                                {{{$curso->docentes()->get()[$i]->Descripcion}}}

                                                </div>
                                        
                                            </div> 
                                        </div> 
                                <br>
                                <hr>
                                <br>
                               
                            @endfor                       
                       
                            
                            
                            </div> 
                     
                     </div>
                     @endif
                     </div>
                    
                
                
                </div>
               
                <div class="col-md-4  container mb-4  ">
                    <div class="card pt-2 white sticky-top">
                        <div class="card-body  px-4 pt-2">
                            <span><strong  style="font-size:2em">$ {{$precio->Precio}} </strong> <strike class="grey-text"  style="font-size:0.75em"> $ 12,45</strike></span>
                            <!-- <span class="grey-text"></br> 95 % de descuento</span>
 -->
                            <a class="btn btn-primary mt-4 w-100 mb-2" onclick="addcarrito({{$curso->id}})">Añadir al carrito</a>
                            <div class="alert alert-danger col-12" role="alert" id="alertaddcarrito">                            
                            </div>
                            <span class="black-text font-weight-bold"></br> Incluye</span>
                            <span class=""></br> 
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                           
                                {{$curso->horas_clase}} horas de Estudio
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
            url: "{{route('process.addcarrito')}}",
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