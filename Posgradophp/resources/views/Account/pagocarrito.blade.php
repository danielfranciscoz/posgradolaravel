@extends('layout.app')
@section('title', 'Pago de Carrito de compra')
@section('content')

@php $totalcarrito=0;
      if(is_array(Session::get('cartItems'))){
            for($i=0;$i<count(Session::get('cartItems'));$i++)
            {
                    $totalcarrito = $totalcarrito + (Session::get('cartItems')[$i]['Precio']);
            }
      }
        
            
@endphp

<main class="mx-4">
    <div class="container ">
    <ul class="stepper stepper-horizontal">

<!-- First Step -->
        <li class=" ">
        <a >
            <span class="circle green">1</span>
            <span class="label font-weight-bold black-text">Carrito de compras</span>
        </a>
        </li>

        <!-- Second Step -->
        <li >
        <a>
            <span class="circle green">2</span>
            <span class="label font-weight-bold black-text">Método de Pago</span>
        </a>
        </li>

        <!-- Third Step -->
        <li class="completed">
        <a href="#!">
            <span class="circle">3 </span>
            <span class="label">Facturación</span>
            {{csrf_field()}}
        </a>
        </li>
        </ul>
    </div>


    <div class="row ">
            <div class="col-md-8 col-sm-12 ">
                <div class="card white lighten-4 mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-4">
                     <h3 class="h3-responsives mt-2 col-md-12 col-sm-12">¡Compra exitosa!</h3>
                     <div class="d-flex justify-content-center col-12">
                        <img  src="{{route('cursos.index')}}/img/compraexitosa.png" class="img-fluid " style="width:200px; height:200px;"/>
                     </div>
                     <span class="col-sm-12 col-md-12 mt-4 text-justify px-5"> Gracias por su pago. La transacción ha sido aceptada. Recibirá un correo electronico de confirmación para la transacción de tarjeta de credito. Ahora puede continuar comprando otros estudios o revisar su <a href="#">historial de transacciones.</a></span>
                     <div class="d-flex justify-content-center col-12">
                        <img  src="{{route('cursos.index')}}/img/cybersource-acceptance_1.png" class="img-fluid " style="width:200px; height:200px;"/>
                     </div> 
                    </div>
                </div>
            </div>
           <div class="col-md-4 col-sm-12 mb-4 mt-2 ">
            <div class="card white sticky-top" >
            <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Detalle de Pago</h5>
                        <div class="row mt-4 mx-2">
                        {{dd($detallePago->get()[0])}}
                        @if(is_array(Session::get('cartItems')))
                                @for($i=0;$i< count(Session::get('cartItems'));$i++)
                                    <div class="col-8">
                                    {{Session::get('cartItems')[$i]['curso']}}
                                    </div>
                                    <div class="col-3 d-flex justify-content-end align-items-end font-weight-bold " style="color:#b71c1c ">
                                    $ {{ number_format(Session::get('cartItems')[$i]['Precio'] , 2)}}
                                    </div>
                                @endfor
                        @endif
                        </div>
                        <hr >

                    <h5 class="h5-responsive mb-3 text-center  font-weight-bold ">Total ({{count(Session::get('cartItems'))}} Estudios): <a  style="color:#b71c1c ">$ {{number_format($totalcarrito, 2) }}</a></h5>
                    
                    <h5 class="h5-responsive mb-3 text-center  font-weight-bold ">!Compra Exitosa¡</h5>
                </div>
            </div>
    </div>
</main>


@endsection



@php 

Session::forget('cartItems')
        
            
@endphp