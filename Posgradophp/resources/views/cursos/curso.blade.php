@extends('layout.app')
@section('title', $curso->NombreCurso)
@section('content')
@php
    $banner;
    $tipo;
    $color_badge;
   
    if($curso->categoria==null){
            $banner = "banner-maestria";
            $tipo = "Maestría";
            $color_badge = "purple";
            $colorbtn1 = "btn-maestria";
            $colorbtn2 = "btn-outline-maestria";
    }else{
        if($curso->categoria->isCursoPosgrado==1){
            $banner = "banner-curso";
            $tipo = "Curso de Especialización";
            $color_badge = "red";
            $colorbtn1 = "btn-danger";
            $colorbtn2 = "btn-outline-danger";
        }
        if($curso->categoria->isCursoPosgrado==0){
            $banner = "banner-posgrado";
            $tipo = "Posgrado";
            $color_badge = "blue";
            $colorbtn1 = "btn-primary";
            $colorbtn2 = "btn-outline-primary";
        }
    }


@endphp

<main class="">

<div class="{{$banner}}" >
<div class="d-block d-sm-none">
    <div class="d-flex align-items-center justify-content-center flex-column mx-4" style="min-height:325px;background: url('{{route('cursos.index')}}/img/Papel tapiz/t.svg');">
           
            
            <h1 class="h1-responsive text-white text-left font-weight-bold mx-4 mt-4">{{$curso->NombreCurso}} </h1>
                                            <div class="row mx-4">
                                                    @if($curso->isPresencial)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Presencial
                                                        </span>      
                                                    @endif
                                                    @if($curso->isSemiPresencial)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} darken-2 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Semi-presencial
                                                        </span>      
                                                    @endif
                                                    
                                                    @if($curso->isVirtual)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} lighten-1 white-text px-2 pt-1 pb-1 " style="font-size:0.7rem;" > 
                                                        Virtual
                                                        </span>      
                                                    @endif
                                            </div>
            <p class="text-white text-justify mx-4 mt-2">{{$curso->Desc_Publicidad}} </p>

                                                   
    </div>
 </div>
 <div style="background: url('{{route('cursos.index')}}/img/Papel tapiz/t.svg');">
 <div class="d-none d-md-block container">
 
   <div class="d-flex align-items-start justify-content-center flex-column  " style="min-height:325px;">
            <h1 class="h1-responsive text-white text-left font-weight-bold ">{{$curso->NombreCurso}} </h1>
                                            <div class="row mx-1">
                                                    @if($curso->isPresencial)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Presencial
                                                        </span>      
                                                    @endif
                                                    @if($curso->isSemiPresencial)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} darken-2 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Semi-presencial
                                                        </span>      
                                                    @endif
                                                    
                                                    @if($curso->isVirtual)
                                                    <span class=" float-left badge badge-pill {{$color_badge}} lighten-1 white-text px-2 pt-1 pb-1 " style="font-size:0.7rem;" > 
                                                        Virtual
                                                        </span>      
                                                    @endif
                                            </div>
            <p class="text-white text-justify mx-1 mt-2">{{$curso->Desc_Publicidad}} </p>

            </div>                                      
    </div>
</div>

</div>

<h5 class="">  </strong></h5>
    <div class="mx-4" >
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
                            <div class="row mx-4">
                            <h4 class="h4-responsive  font-weight-bold mt-4 float-left">
                                
                            Contenido </h4>  
                            <a class="btn btn-sm mt-4 ml-auto font-weight-bold  grey darken-2 text-white" onclick="temario();" >
                                Temario 
                            </a>
                            </div></br> 
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
                             <div class="row">
                                            <div class="col-md-3 col-sm-12 ">
                                                <img src="{{route('cursos.index')}}/{{$curso->docentes()->get()[$i]->Image_URL}}" class="img-fluid rounded-circle" />
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <div class="font-weight-bold {{$color_badge}}-text " >
                                                   
                                                    
                                                     @if($curso->docentes()->get()[$i]->LinkedIn_URL)
                                                     <h5 class="h5-responsive  " onclick="prof('{{$curso->docentes()->get()[$i]->LinkedIn_URL}}')" style="cursor:pointer" > 
                                                          {{$curso->docentes()->get()[$i]->Nombres}}
                                                     </h5>
                                                                                                 
                                                         @else
                                                         <h5 class="h5-responsive"> 
                                                          {{$curso->docentes()->get()[$i]->Nombres}}
                                                     </h5>
                                                            @endif
                                                    
                                                </div>
                                                <div class="font-weight-bold mb-2">
                                                    {{$curso->docentes()->get()[$i]->Profesion}}  
                                                    
                                                </div>
                                              
                                                <div class="text-justify mb-2 ">
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
               
                <div class="col-md-4 col-sm-12  container mb-4  d-block d-sm-none ">
                    <div class="card ">
                         <img src ="{{route('cursos.index')}}/{{$curso->Image_URL}}" style="margin-top:-70%; height:30%;"class="d-none d-md-block white px-2 pt-2"/>
                     </div>
                    <div class=" pt-2 white sticky-top" style=" border: 1px solid rgba(0, 0, 0, 0.125);  border-radius: 0 0 0.25rem 0.25rem;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                        <div class="card-body  px-4 pt-2">
                            <span><strong  style="font-size:2em">$ {{ number_format($precio->Precio, 2)}} </strong> <strike class="grey-text"  style="font-size:0.75em"> $ 12,45</strike></span>
                            <!-- <span class="grey-text"></br> 95 % de descuento</span>
                            
 -->
                            @php
                                $exist = false;
                                if(is_array(Session::get('cartItems'))){
                                    for($i=0;$i< count(Session::get('cartItems')) ;$i++){
                                         if( Session::get('cartItems')[$i]['id'] == $curso->id)
                                         {
                                            $exist =true;
                                         } 
                                        }
                                    }                                    
                            @endphp

                            @if($exist==false)
                            <a class="btn  btn-sm {{$colorbtn1}} mt-4 w-100 " onclick="addcarrito({{$curso->id}})">Añadir al carrito</a>
                            @endif
                            <a class="btn btn-sm  {{$colorbtn2}} w-100 mb-2 text-primary" style="border-color:#007bff" onclick="addandpay({{$curso->id}})">Comprar ahora</a>
                            
                            <div class="alert alert-danger col-12" role="alert" id="alertaddcarritomd">                            
                            </div>
                            <span class="black-text font-weight-bold"></br> Incluye</span>
                            
                            <span class="row "></br>                           
                            <i class="fa fa-clock-o col-2" aria-hidden="true"></i>
                           
                                {{$curso->horas_clase}} horas de Estudio
                            </span>
                            <span class="row"></br> 
                                <i class="fa fa-file-text-o grey-text  col-2" aria-hidden="true"></i>
                                Recursos Descargables
                            </span>
                            <span class="row"></br> 
                                <i class="fa fa-hand-o-right grey-text  col-2" aria-hidden="true"></i>
                                 Acceso de por vida
                            </span>
                            <span class="row"></br> 
                                <i class="fa fa-mobile-phone grey-text  col-2" aria-hidden="true"></i>
                                Acceso en móviles y TV
                            </span>
                            <span class=" row"></br> 
                                <i class="fa fa-certificate grey-text  col-2" aria-hidden="true"></i>
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

                <div class="col-md-4 col-sm-12  container mb-4  d-none d-md-block ">
                    <div class="card " style="height:70%;">
                         <img src ="{{route('cursos.index')}}/{{$curso->Image_URL}}" style="margin-top:-70%; " class="white px-2 pt-2 "/>
                    
                    <div class=" pt-2 white sticky-top" style="margin-top:-0%; border: 1px solid rgba(0, 0, 0, 0.125);  border-radius: 0 0 0.25rem 0.25rem;box-shadow: 0 2px 10 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); border-top: none  ">
                        <div class="card-body  px-4 pt-2">
                            <span><strong  style="font-size:2em">$ {{ number_format($precio->Precio, 2)}} </strong> <strike class="grey-text"  style="font-size:0.75em"> $ 12,45</strike></span>
                            <!-- <span class="grey-text"></br> 95 % de descuento</span>
 -->
                            <a class="btn  btn-sm {{$colorbtn1}} mt-4 w-100 " onclick="addcarrito({{$curso->id}})">Añadir al carrito</a>
                            <a class="btn btn-sm  {{$colorbtn2}} w-100 mb-2 text-primary" style="border-color:#007bff" onclick="addandpay({{$curso->id}})">Comprar ahora</a>
                            
                            <div class="alert alert-danger col-12" role="alert" id="alertaddcarritosm">     

                            </div>
                            <span class="black-text font-weight-bold"></br> Incluye</span>
                            
                            <span class="row " style="font-size:0.9rem">                         
                            <i class="fa fa-clock-o col-2" aria-hidden="true"></i>
                           
                                {{$curso->horas_clase}} horas de Estudio
                            </span>
                            <span class="row" style="font-size:0.9rem">
                                <i class="fa fa-file-text-o grey-text  col-2" aria-hidden="true"></i>
                                Recursos Descargables
                            </span>
                            <span class="row" style="font-size:0.9rem">
                                <i class="fa fa-hand-o-right grey-text  col-2" aria-hidden="true"></i>
                                 Acceso de por vida
                            </span>
                            <span class="row" style="font-size:0.9rem">
                                <i class="fa fa-mobile-phone grey-text  col-2" aria-hidden="true"></i>
                                Acceso en móviles y TV 
                            </span>
                            <span class=" row" style="font-size:0.9rem">
                                <i class="fa fa-certificate grey-text  col-2" aria-hidden="true"></i>
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
$(document).ready(function(){ 
    $("#alertaddcarritosm").hide();
    $("#alertaddcarritomd").hide();
});

 

    function addcarrito(id){
        $.ajax({
            url: "{{route('process.addcarrito')}}",
            type : 'GET',
            data: {
                "curso" : id
            },
            success: function(data) {  
                if (data.message == "error") {
                    $("#alertaddcarritosm").show();
                    $("#alertaddcarritomd").show();
                    $("#alertaddcarritosm").html( "<p class='text-center'>"+data.error+"</p>" );
                    $("#alertaddcarritomd").html( "<p class='text-center'>"+data.error+"</p>" );

                }else{
                   
                    setTimeout(function(){ location.reload(); }, 100);
                }
            }
        });

    }

    function addandpay(id){
        $.ajax({
            url: "{{route('process.addcarrito')}}",
            type : 'GET',
            data: {
                "curso" : id
            },
            success: function(data) {  
                        setTimeout(function(){ 
                        window.location.href = "{{route('carrito')}}"
                    }, 100);
                    
                
            }
        });

    }

    function temario() {
        window.open("{{route('cursos.index')}}/{{$curso->Temario_URL}}", '_blank');
       
    }

    function prof(docente) {
        window.open("https://"+docente, '_blank');
       
    }

</script>

@endsection