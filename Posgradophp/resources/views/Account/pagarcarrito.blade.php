@extends('layout.app')
@section('title', 'Pagando estudios...')
@section('content')
@php $totalcarrito=0 @endphp
            @for($i=0;$i<count(Session::get('cartItems'));$i++)
            {
                    $totalcarrito = $totalcarrito + Session::get('cartItems')[$i]['precio'];
            }
            @endfor

<main class="white mx-4">
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-sm-12 row">
                <div class="card grey lighten-5 mb-4 mt-5 col-12 ">
                     <div class="card-body row mx-5">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Introduzca sus datos</h5>
                
                  {{$estudiante[0]->Nombres}}
                  {{$estudiante[0]->Apellidos}}
                        <input type="text" id="nombres" class="form-control mb-3 col-12" placeholder="Nombres*" required />
                   
                        <!-- Last name -->
                        <input type="text" id="apellidos" class="form-control mb-3 col-12" placeholder="Apellidos*" required /> 
                    
               
                <input type="text" id="dni" class="form-control mb-3 col-12" placeholder="DNI/Cédula*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required/>
                </br>

                <!-- E-mail -->
                <input type="email" id="email" class="form-control mb-3 col-12" placeholder="Correo Electrónico*" required/>

                <!-- Password -->
                
                

                <!-- Phone number -->
                <input type="tel" id="telefono" class="form-control" placeholder="Número Telefónico*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required />
               

            <a class="col-12 mt-2 text-right">Los campos indicados con (*) son obligatorios</a>

            </div>
          
            </div>
            <div class="card grey lighten-5 mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-5">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Datos de Pago</h5>
                     </div>
             </div>
            
        </div>
       <div class="col-md-4 col-sm-12 mb-4 mt-5 ml-2">
        <div class="card  grey lighten-4 " style="height:200px">

                <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Subtotal ({{count(Session::get('cartItems'))}} Estudios): <a  style="color:#b71c1c ">$ {{$totalcarrito}}</a></h5>
                
                           
            </div>
            </div>
    </div>

</main>

@endsection

