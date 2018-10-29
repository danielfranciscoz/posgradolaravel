


@extends('layout.app')
@section('title', 'Inicio')
@section('content')
<main>
    <div class="container">
    <section class="mt-5 wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-9 mb-9 d-flex align-items-center ">
                <div class="row">
                <h5 class="col-12">22 resultados para  <strong> {{$busquedas}}</strong></h5>
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
                            <img src="https://udemy-images.udemy.com/course/240x135/120058_cdc5_7.jpg" class="img-responsive"/>
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
                            <img src="https://udemy-images.udemy.com/course/240x135/120058_cdc5_7.jpg" class="img-responsive"/>
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
    <img src="https://udemy-images.udemy.com/course/240x135/120058_cdc5_7.jpg" class="img-responsive"/>
    </div>
    <div class="col-8">
        <h4>Cisco CCNA 200-125 </h4>
        <p>74 Clases - 14 Horas - Principiante</p> 
        <span>
        <span>Aprende sobre <strong>redes</strong> con equipos Cisco de forma fácil. Curso CCNA 200-125</span></span> 
    </div>

</div>


</div>
                </div>

                </div>
                <div class="col-md-3 mb-3  d-flex align-items-center ">

               

                </div>

    </div>
</main>
@endsection

