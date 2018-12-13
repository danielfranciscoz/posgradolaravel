


@extends('layout.app')
@section('title', 'Buscando '.$search_value)
@section('content')
<main >
    <div class="container" >
    <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-9 d-flex align-items-center  ">
                <div class="row">
              
               
                @if($cursos->isNotEmpty())
                <h5 class="col-6 mt-4 font-weight-bold">{{$cursos->total()}} resultado(s) para {{$search_value}} <strong> </strong></h5>
             
               
                <div class="col-6 d-flex justify-content-end  align-items-center font-weight-bold">
                        <label>Ordenar por: </label>&nbsp
                        <select class="mdb-select md-form colorful-select dropdown-primary">
                            <option value="1">Más reciente</option>
                            <option value="2">Precio más bajo</option>
                            <option value="3">Precio más alto</option>            
                        </select>             
                        </div>
                @endif
                        @forelse($cursos as $curso)                        
                               
                        <div class="col-12">
                        <!-- Card content -->
                        <div class="card mb-2 mt-2 ">
                            <div class="card-body row"  >
                                <div class="col-md-4 col-sm-6 d-flex justify-content-center  align-items-center " >
                                   
                                    <img src= {{$curso->curso->Image_URL}} class="img-responsive" class="img-fluid"/>
                                </div>

                                <div class="col-md-8 col-sm-6 ">
                                        <p style="margin-bottom:0" class="mt-2"> 
                                        <p class="float-right " onclick='addcart({{$curso->curso->id}})' style="cursor: pointer;" ><i class="fa  fa-cart-plus  fa-2x" aria-hidden="true"></i></p> 
                                            <p class="h4-responsive font-weight-bold"  onclick='curso("{{$curso->curso->NombreCurso}}");' style="cursor: pointer; margin-bottom:0;"> {{$curso->curso->NombreCurso}}</p>
                                            
                                            <p class="h6-responsive" style="color:#616161; margin-bottom:0"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$curso->curso->HorasClase}} Horas Clase &nbsp<i class="fa fa-certificate grey-text" aria-hidden="true">  </i>
                                Certificación &nbsp <i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                                Recursos Descargables</p> 
                                        </p>
                                        <p><span>{{$curso->curso->Desc_Publicidad}}</p>
                                        <hr>
                                       
                                        <span class="font-weight-bold float-right"  style="color:#b71c1c "> 
                                            $ {{$curso->Precio}}
                                        </span> 
                                        
                                    
                                
                                </div>

                            </div>
                        </div>

                    </div>
                        @Empty
                       
                        <div class="container row" >
                       
                            <div class="card   white  mb-4 px-4 " >
                                <h6 class="h6-responsive font-weight-bold ml-4 mt-4">No tenemos una oferta académica disponible para {{$search_value}}</h6>
                                <div class="d-flex align-items-center justify-content-center text-center " style="height:300px">
                                    <h6 class="h6-responsive ">Lamentablemente no hemos encontrado un Oferta académica con tus criterios de búsqueda, pero puedes seguir intentando buscar alguno.<strong> </strong></h6>                        
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
                                            <a class="page-link" tabindex="-1" onclick="redirect({{$cursos->currentPage()-1}});">Anterior</a>
                                        </li>
                                    @else
                                    <li class="page-item ">
                                            <a class="page-link" tabindex="-1" onclick="redirect({{$cursos->currentPage()-1}});">Anterior</a>
                                        </li>
                                    @endif
                                       
                                        @for($i=1;$i<=$cursos->lastPage();$i++)
                                        @if($i == $cursos->currentPage())
                                        @if($i == 0)

                                        @endif
                                        <li class="page-item active" onclick="redirect({{$i}});"><a class="page-link ">{{$i}}</a></li>
                                        @else
                                        <li class="page-item" onclick="redirect({{$i}});"><a class="page-link">{{$i}}</a></li>
                                        @endif
                                        @endfor
                                        @if($cursos->currentPage()==$cursos->lastPage())
                                            <li class="page-item disabled">
                                                    <a class="page-link" onclick="redirect({{$cursos->currentPage()+1}});">Siguiente</a>
                                                </li>
                                            @else
                                            <li class="page-item ">
                                                    <a class="page-link" onclick="redirect({{$cursos->currentPage()+1}});">Siguiente</a>
                                                </li>
                                         @endif
                                       


                                       
                                        </ul>
                                    </nav>
                            </div>
                        </div>     
                       @endif                 
                
                </div>

                </div>
                <div class="col-md-3 mb-3  d-flex align-items-center ">
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

<script>
 
 function redirect(page)
 {
     window.location.href ="/oferta/estudio/find/{{$search_value}}?page="+page;
 }
 function curso(page)
 {
     window.location.href = "/oferta/estudio/"+page;
 }

   function addcart(id){
     $.ajax({
         url: "/process/addcarrito",
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