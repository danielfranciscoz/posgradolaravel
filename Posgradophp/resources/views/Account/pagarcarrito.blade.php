@extends('layout.app')
@section('title', 'Pagando estudios...')
@section('content')
@php $totalcarrito=0;
            for($i=0;$i<count(Session::get('cartItems'));$i++)
            {
                    $totalcarrito = $totalcarrito + (Session::get('cartItems')[$i]['Precio']);
            }
            
@endphp
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
</style>
<main class=" mx-4">
    <div class="container ">
    <ul class="stepper stepper-horizontal">

<!-- First Step -->
<li class=" ">
  <a href="/account/carrito">
    <span class="circle green">1</span>
    <span class="label font-weight-bold black-text">Carrito de compras</span>
  </a>
</li>

<!-- Second Step -->
<li class="completed">
  <a href="/account/pagarcarrito">
    <span class="circle">2</span>
    <span class="label">Método de Pago</span>
  </a>
</li>

<!-- Third Step -->
<li >
  <a href="#!">
    <span class="circle">3 </span>
    <span class="label">Facturación</span>
  </a>
</li>
</ul>
        <div class="row">
            <div class="col-md-8 col-sm-12 row">
                <div class="card grey lighten-5 mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-5">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Información de Facturación</h5>
                     <label class="col-12">Nombres:</label>
                        <input type="text" id="nombres" class="form-control mb-3 col-12" placeholder="Nombres*" value="{{$estudiante[0]->Nombres}}" required />
                   
                        <label class="col-12">Apellidos:</label>
                        <input type="text" id="apellidos" class="form-control mb-3 col-12" placeholder="Apellidos*" value="{{$estudiante[0]->Apellidos}}"  required /> 
                        <label class="col-12">DNI / Cédula:</label>
               
                <input type="text" id="dni" class="form-control mb-3 col-12" placeholder="DNI/Cédula*" value="{{$estudiante[0]->DNI}}" aria-describedby="defaultRegisterFormPhoneHelpBlock" required/>
                </br>

                <label class="col-12">Correo Electrónico:</label>
                <input type="email" id="email" class="form-control mb-3 col-12" placeholder="Correo Electrónico*" value="{{Auth::user()->email}}" required/>

                <label class="col-12">Número Telefónico:</label>
                <input type="tel" id="telefono" class="form-control" placeholder="Número Telefónico*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required value="{{$estudiante[0]->Telefono}}" />
               

            <a class="col-12 mt-2 text-right">Los campos indicados con (*) son obligatorios</a>

            </div>
          
            </div>
            <div class="card grey lighten-5 mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-5">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Información de Pago</h5>
                     <label class="col-12">Tarjeta de Credito:</label>
                     <input type="text" autocomplete="cc-number" id="tarjeta" class="form-control col-12" placeholder="Numero de Tarjeta*"  required />
                     <label class="col-12">Nombre del Titular:</label>
                     <input type="text" id="nombre"  autocomplete="cc-name" class="form-control col-12" placeholder="Nombres y apellidos*"  required />
                     <label class="col-12">Fecha de Vencimiento:</label>
                     <input type="text" autocomplete="cc-exp-month" id="mes" class="form-control col-6" placeholder="Mes de vencimiento/MM*"  required />
         
                     <input type="text" autocomplete="cc-exp-year" id="año" class="form-control col-6" placeholder="Año de vencimiento/YYYY*"  required />
                     <label class="col-12">CVC:</label>
                     <input type="text" id="tarjeta" class="form-control  col-12" placeholder="Codigo de Seguridad*"  required />


                     </div>
             </div>
            
        </div>
       <div class="col-md-4 col-sm-12 mb-4 mt-2 ml-2">
        <div class="card  white sticky-top" >
        <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Detalle de Pago</h5>
                    <div class="row mt-4 mx-2">
                            @for($i=0;$i<count(Session::get('cartItems'));$i++)
                                <div class="col-8">
                                {{Session::get('cartItems')[$i]['curso']}}
                                </div>
                                <div class="col-3 d-flex justify-content-end align-items-end font-weight-bold " style="color:#b71c1c ">
                                 $ {{Session::get('cartItems')[$i]['Precio']}}
                                </div>
                            @endfor
                    </div>
                    <hr >

                <h5 class="h5-responsive mb-3 text-center  font-weight-bold ">Subtotal ({{count(Session::get('cartItems'))}} Estudios): <a  style="color:#b71c1c ">$ {{$totalcarrito}}</a></h5>
                
                <button class="g-recaptcha btn btn-primary mt-2 w-95 mb-2 mx-4 mb-4" data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq" data-callback="YourOnSubmitFn" >Realizar Pago</button>
                           
            </div>
            </div>
    </div>

</main>

@endsection

