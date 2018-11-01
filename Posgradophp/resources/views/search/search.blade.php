


@extends('layout.app')
@section('title', 'Buscando '.$busquedas)
@section('content')
<main >
    <div class="container" >
    <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-9 d-flex align-items-center  ">
                <div class="row">
                <h5 class="col-12">22 resultados para  <strong> {{$data->$Etiqueta}}</strong></h5>
                <div class="col-12">
                <label>Ordenar por: </label>
                <select class="mdb-select md-form colorful-select dropdown-primary">
                <option value="1">Más reciente</option>
                <option value="2">Precio más bajo</option>
                <option value="3">Precio más alto</option>
                
               
                </select>
              
                </div>
                    
                    <div class="card col-12">

                        <!-- Card content -->
                        <div class="card-body row">
                            <div class="col-4 " >
                            <img src="/img/Resources/test_img_0.png" class="img-responsive"/>
                            </div>
                            <div class="col-8">
                                <h4>Cisco CCNA 200-125 </h4>
                                <p>74 Clases - 14 Horas - Principiante</p> 
                                <span>
                                <span>Aprende sobre <strong>redes</strong> con equipos Cisco de forma fácil. Curso CCNA 200-125</span></span> 
                            </div>

                        </div>


                    </div>
                    
                    <div class="card col-12">

                        <!-- Card content -->
                        <div class="card-body row">
                            <div class="col-4 " >
                            <img src="/img/Resources/test_img_1.png" class="img-responsive"/>
                            </div>
                            <div class="col-8">
                                <h4>Cisco CCNA 200-125 </h4>
                                <p>74 Clases - 14 Horas - Principiante</p> 
                                <span>
                                <span>Aprende sobre <strong>redes</strong> con equipos Cisco de forma fácil. Curso CCNA 200-125</span></span> 
                            </div>

                        </div>


                    </div>
                    
                    <div class="card col-12">

                    <!-- Card content -->
                                        <div class="card-body row">
                                            <div class="col-4 " >
                                            <img src="/img/Resources/test_img_2.png" class="img-responsive"/>
                                            </div>
                                            <div class="col-8">
                                                <h4>Cisco CCNA 200-125 </h4>
                                                <p>74 Clases - 14 Horas - Principiante</p> 
                                                <span>
                                                <span>Aprende sobre <strong>redes</strong> con equipos Cisco de forma fácil. Curso CCNA 200-125</span></span> 
                                            </div>

                                </div>


                    </div>

                    <div class="col-12">
                   </br>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation container">
                                <ul class="pagination pg-blue">
                                    <li class="page-item disabled">
                                    <a class="page-link" tabindex="-1">Anterior</a>
                                    </li>
                                    <li class="page-item"><a class="page-link">1</a></li>
                                    <li class="page-item active">
                                    <a class="page-link">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link">3</a></li>
                                    <li class="page-item">
                                    <a class="page-link">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                    </div>
                    </div>
                </div>

                </div>
                <div class="col-md-3 mb-3  d-flex align-items-center ">

               

                </div>
                


                    

    </div>
</main>
@endsection

