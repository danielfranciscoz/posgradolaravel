

@extends('layout.app')
@section('title', 'Categoria '.$categoria)
@section('content')
<main >
    <div class="container" >
    <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-9 d-flex align-items-center  ">
                <div class="row">
                <h5 class="col-12">Categoría > {{$categoria}} <strong> </strong></h5>
             <h6 class="col-12">Disponemos de {{$cursos->total()}} cursos para ti.</h6>
               
               
                @if($cursos->isNotEmpty())
                <div class="col-12">
                        <label>Ordenar por: </label>
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
                        <div class="card mb-4 mt-2">
                            <div class="card-body row" onclick='curso("{{$curso->curso()->first()->NombreCurso}}");' >
                                <div class="col-4 " >
                                   
                                    <img src= {{ $curso->curso()->first()->Image_URL}} class="img-responsive" class="w-100"/>
                                </div>

                                <div class="col-8">
                                        <p style="margin-bottom:0"> 
                                            <p class="h4-responsive font-weight-bold" style="margin-bottom:0" > {{$curso->curso()->first()->NombreCurso}}</p>
                                            <p class="h6-responsive" style="color:#616161; margin-bottom:0">Horas Clase - {{$curso->curso()->first()->HorasClase}} Horas</p>
                                        </p>
                                        <p><span>{{$curso->curso()->first()->Desc_Publicidad}}</p>
                                        <h5 class="font-weight-bold float-left "  style="color:#b71c1c "> 
                                            $ {{$curso->Precio}}
                                        </h5> 
                                </div>

                            </div>
                        </div>

                    </div>
                      
                        
                        @Empty
                        <h6 class="col-12">Lamentablemente no hemos encontrado un curso con tus criterios de búsqueda, pero puedes seguir intentando buscar alguno.<strong> </strong></h6>                        
                        @endforelse

                       @if($cursos->isNotEmpty())
                       <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation container">
                                    <ul class="pagination pg-blue">
                                        <li class="page-item disabled">
                                        <a class="page-link" tabindex="-1" onclick="redirect({{$cursos->currentPage()-1}});">Anterior</a>
                                        </li>
                                        
                                        @for($i=1;$i<=$cursos->lastPage();$i++)
                                        @if($i == $cursos->currentPage())
                                        <li class="page-item active" onclick="redirect({{$i}});"><a class="page-link ">{{$i}}</a></li>
                                        @else
                                        <li class="page-item" onclick="redirect({{$i}});"><a class="page-link">{{$i}}</a></li>
                                        @endif
                                        @endfor
                                        <!-- <li class="page-item active">
                                        <a class="page-link">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link">3</a></li> -->
                                        <li class="page-item">
                                        <a class="page-link" onclick="redirect({{$cursos->currentPage()+1}});">Siguiente</a>
                                        </li>
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
</main>
@endsection

<script>
    function redirect(page)
    {
        window.location.href ="../categorias/{{$categoria}}?page="+page;
    }
    function curso(page)
    {
        window.location.href = "../curso/"+page;
    }
</script>