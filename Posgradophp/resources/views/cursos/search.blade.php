

@php
   $colors = Array("primary","secondary","success","danger","warning","info","green","light","dark","morado","cyan");
@endphp
@extends('layout.app')
@section('title', 'Buscando '.$search_value)
@section('content')
<main >

 @php 
    $totalcarrito=0
 @endphp
 @if(is_array(Session::get('cartItems')))
     @for($i=0;$i<count(Session::get('cartItems'));$i++)
         @php 
            $totalcarrito=$totalcarrito + Session::get('cartItems')[$i]['Precio']; 
         @endphp
     @endfor
@endif
    <div class="container" >
    <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-9 d-flex align-items-center  ">
                <div class="row">
              
               
         
                    @if($cursos->total() > 1)
                    
                        <h5 class="col-md-6 col-sm-12 mt-4">{{$search_value}} {{$cursos->total()}} elementos encontrados <strong> </strong></h5>
                    @else
                        <h5 class="col-md-6 col-sm-12 mt-4">{{$search_value}}: {{$cursos->total()}} elemento encontrado <strong> </strong></h5>
                    @endif
                            
               
                    <div class="col-md-12 col-sm-12  d-flex justify-content-start  align-items-center  row">

                        <div class="custom-control custom-checkbox mx-2 col-sm-12 col-md-3">
                                    <input type="checkbox" class="custom-control-input" id="presencial">
                                    <label class="custom-control-label" for="presencial">Presencial</label>
                                    
                        </div>
                        <div class="custom-control custom-checkbox mx-2 col-sm-12 col-md-4">
                                    <input type="checkbox" class="custom-control-input" id="semipresencial">
                                    <label class="custom-control-label" for="semipresencial">Semi-presencial</label>
                                    
                        </div>
                        <div class="custom-control custom-checkbox mx-2 col-sm-12 col-md-2">
                                    <input type="checkbox" class="custom-control-input" id="virtual">
                                    <label class="custom-control-label" for="virtual">Virtual</label>
                                    
                        </div>
      
                    </div>
                    <div class="col-md-12 col-sm-12 d-flex justify-content-end  align-items-center font-weight-bold">
                    
                          
                            <label class="mx-2 mt-1 ">Orden: </label>&nbsp
                            <select class="mdb-select md-form colorful-select dropdown-primary px-2" id="sorden">
                                <option value="1">Más reciente</option>
                                <option value="2">Precio Descendente</option>
                                <option value="3">Precio Ascendente</option>            
                                
                            </select>             
                    </div>
                 
             
                        @forelse($cursos as $curso)                        
                            
                        <div class="col-12">
                        <!-- Card content -->
                        <div class="card mb-2 mt-2 ">
                            <div class="card-body row"  >
                                <div class="col-md-4 col-sm-6 d-flex justify-content-center  align-items-center " >
                                   
                                    <img src= "{{route('cursos.index')}}/{{$curso->curso->Image_URL}}"  class="img-fluid"/>
                                </div>

                                <div class="col-md-8 col-sm-6 ">
                                        <p style="margin-bottom:0" class="mt-2"> 
                                        <p class="float-right " onclick='addcart({{$curso->curso->id}})' style="cursor: pointer;" ><i class="fa  fa-cart-plus  fa-2x" aria-hidden="true"></i></p> 
                                            <p class="h4-responsive font-weight-bold"  onclick='curso("{{$curso->curso->NombreCurso}}");' style="cursor: pointer; margin-bottom:0;"> {{$curso->curso->NombreCurso}}</p>
                                                 @if($curso->curso->isPresencial)
                                                    <span class=" float-left badge badge-pill blue darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Presencial
                                                        </span>      
                                                    @endif
                                                    @if($curso->curso->isSemiPresencial)
                                                    <span class=" float-left badge badge-pill blue darken-2 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                        Semi-presencial
                                                        </span>      
                                                    @endif
                                                    
                                                    @if($curso->curso->isVirtual)
                                                    <span class=" float-left badge badge-pill blue lighten-1 white-text px-2 pt-1 pb-1 " style="font-size:0.7rem;" > 
                                                        Virtual
                                                        </span>      
                                                    @endif
                                             
                                                    &nbsp
                                            
                                            <p class="h6-responsive " style="color:#616161; margin-bottom:0"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$curso->curso->HorasClase}} Horas Clase &nbsp<i class="fa fa-certificate grey-text" aria-hidden="true">  </i>
                                            Certificación &nbsp <i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                                            Recursos Descargables
                                            </p> 
                                        </p>
                                       
                                                   
                                               
                                          
                                        <p><span>{{$curso->curso->Desc_Publicidad}}</p>
                                        <hr>
                                        
                                        @if($curso->curso->categoria==null)
                                            <span class=" float-left badge badge-pill  purple darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                            Maestría
                                            </span> 
                                        @elseif($curso->curso->categoria->isCursoPosgrado==1)
                                            <span class=" float-left badge badge-pill red darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                Curso Especializado
                                            </span> 
                                            <span class=" float-left badge badge-pill red darken-2 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                {{$curso->curso->categoria->Categoria}}
                                            </span> 
                                        @elseif($curso->curso->categoria->isCursoPosgrado==0)
                                            <span class=" float-left badge badge-pill blue darken-4 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" >                                        
                                                Posgrado
                                            </span>    
                                            <span class=" float-left badge badge-pill blue darken-2 white-text px-2 pt-1 pb-1" style="font-size:0.7rem;" > 
                                                {{$curso->curso->categoria->Categoria}}
                                            </span>                                      
                                        @endif         
                                                           
                                            <span class="font-weight-bold float-right"  style="color:#b71c1c "> 
                                                $ {{number_format($curso->Precio, 2)}}
                                            </span> 
                                </div>

                            </div>
                        </div>

                    </div>
                        @Empty
                       
                        <div class="container " >
                        
                       
                            <div class="card   white  mb-4 px-4 mx-4" >
                                <div class="d-flex align-items-center justify-content-center  row" style="height:300px">
                                        <img src="{{route("cursos.index")}}/img/no_result.png" height="100"/>
                                        <span class=" text-center col-12">Lamentablemente no hemos encontrado un oferta académica para <strong>{{$search_value}}</strong>, prueba intentar con otras palabras.</span>                        
                                </div>
                            </div>
                        </div>
                        @endforelse

                       @if($cursos->isNotEmpty())
                       <div class="col-12 ">
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation container">
                                    <ul class="pagination pg-blue">
                                    @if($cursos->currentPage()==1)
                                    <li class="page-item disabled">
                                            <a class="page-link" tabindex="-1" onclick="orden({{$cursos->currentPage()-1}});">Anterior</a>
                                        </li>
                                    @else
                                    <li class="page-item ">
                                            <a class="page-link" tabindex="-1" onclick="orden({{$cursos->currentPage()-1}});">Anterior</a>
                                        </li>
                                    @endif
                                       
                                        @for($i=1;$i<=$cursos->lastPage();$i++)
                                        @if($i == $cursos->currentPage())
                                        @if($i == 0)

                                        @endif
                                        <li class="page-item active" onclick="orden({{$i}});"><a class="page-link ">{{$i}}</a></li>
                                        @else
                                        <li class="page-item" onclick="orden({{$i}});"><a class="page-link">{{$i}}</a></li>
                                        @endif
                                        @endfor
                                        @if($cursos->currentPage()==$cursos->lastPage())
                                            <li class="page-item disabled">
                                                    <a class="page-link" onclick="orden({{$cursos->currentPage()+1}});">Siguiente</a>
                                                </li>
                                            @else
                                            <li class="page-item ">
                                                    <a class="page-link" onclick="orden({{$cursos->currentPage()+1}});">Siguiente</a>
                                                </li>
                                         @endif
                                       


                                       
                                        </ul>
                                    </nav>
                            </div>
                        </div>     
                       @endif                 
                
                </div>

                </div>
                <div class="col-md-3 col-sm-12 mb-4 ">
                <div class="sticky-top">
             
                @if(count($etiquetas)>0)
                    <div class="card  white  px-4 mb-4" style="margin-top: 77 !important">
                        <div class="row ">
                                <label class="col-12  mt-2  mb-2 font-weight-bold">Búsquedas relacionadas</label>
                                @for($i=0;$i<count($etiquetas);$i++)

                                <h5 class="mx-1" onclick="searchetiqueta('{{$etiquetas[$i]->Etiqueta}}')" style="cursor: hand; "><span class="badge  badge-pill badge-{{$colors[array_rand($colors)]}}" style="font-weight:normal;">{{$etiquetas[$i]->Etiqueta}}</span></h5>
                                @endfor
                            
                         </div>
                    </div>
                @endif
                @if(Session::has('cartItems'))
                        <div class="card  white  px-4 mb-5" style="height:200px ">
                            <h6 class="h6-responsive mt-3 text-center  font-weight-bold ">Subtotal ({{count(Session::get('cartItems'))}} Estudio(s)): <a  style="color:#b71c1c ">$ {{number_format($totalcarrito, 2) }}</a></h6>
                        
                        <a class="btn btn-primary mt-2 w-95 mb-2 btn-sm" href="{{route('pagarcarrito')}}">Proceder al Pago</a>
                        <div class="mt-2 d-flex justify-content-center grey-text">
                                            <i class="fa fa-cc-visa fa-3x mx-1" aria-hidden="true"></i>
                                            <i class="fa fa-cc-amex fa-3x mx-1" aria-hidden="true"></i>
                                            <i class="fa fa-cc-mastercard fa-3x mx-1" aria-hidden="true"></i>
                            </div>
                                
                        </div>
                @endif
                </div>
                </div>
                
    </div>

<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-frame modal-bottom" role="document">

    <div class="modal-content">
        <div class="modal-body">
            <div class="row d-flex justify-content-center align-items-center">

            <p class="mt-4 pt-1 mr-4 font-weight-bold" id="alertaddcarrito">
            </p>

            <button type="button" class="btn btn-sm red darken-4 font-weight-bold" data-dismiss="modal">CERRAR</button>       
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection

@section('endscript')
<script>
@php 

$seg = Request::segment(5);

    if($seg == null){
        echo '$("#sorden").val("1");';
    }else{    
        if($seg == "precio_desc"){
            echo '$("#sorden").val("2");';
        }
        if($seg == "precio_asc"){
            echo '$("#sorden").val("3");';
        }
    
    }
@endphp
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
       return null;
    }
    return decodeURI(results[1]) || 0;
}

var virtual;
var semipresencial;
var presencial;


        if($.urlParam('v')!= 1 && $.urlParam('v')!= 0){
        virtual = 1;   
    }else{
        virtual = parseInt($.urlParam('v'));
    }

    if($.urlParam('s')!= 1 && $.urlParam('s')!= 0){
        semipresencial= 1
    }else{
        semipresencial = parseInt($.urlParam('s'));
    }

    if($.urlParam('p')!= 1 && $.urlParam('p')!= 0){
        presencial = 1
    }else{
        presencial = parseInt($.urlParam('p'));
    }
    $("#presencial").prop("checked", presencial); 
    $("#semipresencial").prop("checked", semipresencial);
    $("#virtual").prop("checked", virtual);




  

 $( "#sorden" ).change(function() {
        orden({{$cursos->currentPage()}});
   });

    function orden(page)
    {
        id = parseInt($("#sorden").val());
        switch(id) {
            case 1:
                window.location.href ="{{route('cursos.cursodetalle')}}/find/{{$search_value}}?page="+page+"&p="+presencial+"&s="+semipresencial+"&v="+virtual;
            break;
            case 2:
                window.location.href ="{{route('cursos.cursodetalle')}}/find/{{$search_value}}/precio_desc?page="+page+"&p="+presencial+"&s="+semipresencial+"&v="+virtual;
            break;
            case 3:
                window.location.href ="{{route('cursos.cursodetalle')}}/find/{{$search_value}}/precio_asc?page="+page+"&p="+presencial+"&s="+semipresencial+"&v="+virtual;
            break;

        }
        
    }

function changemodalidad(){
    

    if ($('#presencial').is(":checked"))
    {
      presencial = 1
    }else{
        presencial = 0
    }
    if ($('#semipresencial').is(":checked"))
    {
        semipresencial = 1
    }else{
        semipresencial = 0
    }
    if ($('#virtual').is(":checked"))
    {
        virtual = 1
    }else{
        virtual = 0
    }
    orden({{$cursos->currentPage()}});
    
}

    $('#virtual').change(function() {
        changemodalidad();
    });
    $('#semipresencial').change(function() {
        changemodalidad();
    });
    $('#presencial').change(function() {
        changemodalidad();
    });
        
 function curso(page)
 {
     window.location.href = "{{route('cursos.cursodetalle')}}/"+page;
 }


 function searchetiqueta(etiqueta)
 {
     window.location.href = "{{route('cursos.search')}}/"+etiqueta;
 }

   function addcart(id){
     $.ajax({
         url: "{{route('process.addcarrito')}}",
         type : 'GET',
         data: {
             "curso" : id
         },
         success: function(data) {  
             if (data.message == "error") {
                
                 $( "#alertaddcarrito").html( "<p class='text-center'>"+data.error+"</p>" );
                 $("#frameModalBottom").modal('show');
                
             }else{
                
                 setTimeout(function(){ location.reload(); }, 00);
             }
         }
     });

 }

 

</script>
@endsection