

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
                 <div class="card col-12">
                        <!-- Card content -->
                            <div class="card-body row">
                                <div class="col-4 " >
                                <img src={{$curso->Image_URL}} class="img-responsive"/>
                                </div>
                                <div class="col-8">
                                    <h4>{{$curso->NombreCurso}} </h4>
                                    <p>Horas Clase - {{$curso->HorasClase}} Horas - {{$curso->Nivel}}</p> 
                                    <span>
                                    <span>{{$curso->Descripcion}}</span> 
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
                                        <a class="page-link" tabindex="-1">Anterior</a>
                                        </li>
                                        
                                        @for($i=1;$i<=$cursos->lastPage();$i++)
                                        @if($i == $cursos->currentPage())
                                        <li class="page-item active"><a class="page-link ">{{$i}}</a></li>
                                        @else
                                        <li class="page-item"><a class="page-link">{{$i}}</a></li>
                                        @endif
                                        @endfor
                                        <!-- <li class="page-item active">
                                        <a class="page-link">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link">3</a></li> -->
                                        <li class="page-item">
                                        <a class="page-link">Siguiente</a>
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

