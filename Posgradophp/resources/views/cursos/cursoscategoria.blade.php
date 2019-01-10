@extends('layout.app')
@section('title', 'Categoria '.$categoria->Categoria)
@section('content')
<main class="">
    <div class="container" >
    
    <section class="mt-4 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
               
                <div class="col-md-9 col-sm-12 d-flex align-items-center font-weight-bold  ">
                <div class="row">
                <nav aria-label="breadcrumb" class="col-12">
                    <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a class="black-text" href="#">Categoría</a></li>
                    <li class="breadcrumb-item black-text"><a class="black-text" href="#">{{$categoria->Categoria}}</a></li>
                    
                    </ol>
                </nav>
                @if($cursos->isNotEmpty())
                <div class="col-6 mt-4">
                    <h6 class="h6-responsive font-weight-bold">Disponemos de {{$cursos->total()}}  
                                        @if($categoria->isCursoPosgrado)
                                            Curso(s) de especialización
                                        @else
                                            Posgrado(s)
                                        @endif 
                                        para ti.
                    </h6>
                    </div>
              
                <div class="col-6 d-flex justify-content-end  align-items-center">
                        <label>Ordenar por:</label> &nbsp
                        <select class="mdb-select md-form colorful-select dropdown-primary" id="sorden">
                            <option value="1">Mas Reciente</option>
                            <option value="2">Precio Descedente</option>
                            <option value="3">Precio Ascendente</option>            
                        </select>             
                </div>
                @endif
                        @forelse($cursos as $curso)                        
                 <div class="col-12 ">
                        <!-- Card content -->
                        <div class="card mb-2 mt-2 ">
                            <div class="card-body row"  >
                                <div class="col-md-4 col-sm-6 d-flex justify-content-center  align-items-center " >
                                   
                                    <img src="/{{route('cursos.index')}}{{$curso->curso->Image_URL}}" class="img-fluid"/>
                                </div>

                                <div class="col-md-8 col-sm-6 ">
                                        <p style="margin-bottom:0" class="mt-2"> 
                                        <p class="float-right " onclick='addcart({{$curso->id}})' style="cursor: pointer;" ><i class="fa  fa-cart-plus  fa-2x" aria-hidden="true"></i></p> 
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
                           <h6 class="h6-responsive font-weight-bold ml-4 mt-4">No tenemos una oferta académica disponible para esta categoria {{$categoria->Categoria}}</h6>
                           <div class="d-flex align-items-center justify-content-center text-center " style="height:300px">
                               <h6 class="h6-responsive ">Lamentablemente no hemos encontrado un Oferta académica con tus criterios de búsqueda, pero puedes seguir intentando buscar alguno.<strong> </strong></h6>                        
                           </div>
                       </div>
                   </div>
 
                        
                        @endforelse

                       @if($cursos->isNotEmpty())
                       <div class="col-12">
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
                <div class="col-md-3 mb-3  d-flex align-items-center ">
                </div>
    </div>


    <div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">

<!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
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
$seg = Request::segment(4);

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
  

 $( "#sorden" ).change(function() {
        orden({{$cursos->currentPage()}});
   });

    function orden(page)
    {
        id = parseInt($("#sorden").val());
        switch(id) {
            case 1:
                window.location.href ="{{route('cursos.categoriadetalle')}}/{{$categoria->Categoria}}?page="+page;
            break;
            case 2:
                window.location.href ="{{route('cursos.categoriadetalle')}}/{{$categoria->Categoria}}/precio_desc?page="+page;
            break;
            case 3:
                window.location.href ="{{route('cursos.categoriadetalle')}}/{{$categoria->Categoria}}/precio_asc?page="+page;
            break;

        }
        
    }
    function curso(page)
    {
        window.location.href = "{{route('cursos.cursodetalle')}}/"+page;
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