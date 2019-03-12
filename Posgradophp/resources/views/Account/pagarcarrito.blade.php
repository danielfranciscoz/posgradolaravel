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
  <a href="{{route('carrito')}}">
    <span class="circle green">1</span>
    <span class="label font-weight-bold black-text">Carrito de compras</span>
  </a>
</li>

<!-- Second Step -->
<li class="completed">
  <a href="{{route('pagarcarrito')}}">
    <span class="circle">2</span>
    <span class="label">Método de Pago</span>
  </a>
</li>

<!-- Third Step -->
<li >
  <a href="#!">
    <span class="circle">3 </span>
    <span class="label">Facturación</span>
    {{csrf_field()}}
  </a>
</li>
</ul>
        <div class="row ">
            <div class="col-md-8 col-sm-12 ">
                <div class="card grey lighten-4 mb-4 mt-2 col-12 ">
                     <div class="card-body row ">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Información de facturación</h5>
                     <label class="col-12">Nombres:</label>
                        <input type="text" id="nombres" class="form-control mb-3 col-12" placeholder="Nombres*" value="{{$estudiante[0]->Nombres}}" required />
                   
                        <label class="col-12">Apellidos:</label>
                        <input type="text" id="apellidos" class="form-control mb-3 col-12" placeholder="Apellidos*" value="{{$estudiante[0]->Apellidos}}"  required /> 
                        </br>

                <label class="col-12">Correo Electrónico:</label>
                <input type="email" id="email"  autocomplete="email" class="form-control mb-3 col-12" placeholder="Correo Electrónico*" value="{{Auth::user()->email}}" required/>

                <label class="col-12">Número Telefónico:</label>
                <input type="tel" id="telefono" autocomplete="tel" class="form-control" placeholder="Número Telefónico*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required value="{{$estudiante[0]->Telefono}}" />
               
                <label class="col-12">Dirección:</label>
                <input type="text" id="direccion" autocomplete="street-address" class="form-control" placeholder="Dirección de Facturación*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
                
                <label class="col-12">Ciudad:</label>
                <input type="text" id="ciudad" autocomplete="address-level2" class="form-control" placeholder="Ciudad*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
                
                <label class="col-12">Estado:</label>
                <input type="text" id="ciudad" autocomplete="address-level1" class="form-control" autocomplete="" placeholder="Provincia o estado*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
               
                <label class="col-12">Pais:</label>
                <input type="text" id="pais" autocomplete="country-name" class="form-control" autocomplete="country-name" placeholder="Pais*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
               
                <label class="col-12">Codigo Postal:</label>
                <input type="text" id="postal"   autocomplete="postal-code" class="form-control" autocomplete="postal-code" placeholder="Codigo Apostal*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
               
            <a class="col-12 mt-2 text-right">Los campos indicados con (*) son obligatorios</a>

            </div>
          
            </div>
            <div class="card grey lighten-4 mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-2">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Información de tarjeta de crédito o débito</h5>
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
       <div class="col-md-4 col-sm-12 mb-4 mt-2 ">
        <div class="card  white sticky-top" >
        <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Detalle de Pago</h5>
                    <div class="row mt-4 mx-2">
                            @for($i=0;$i<count(Session::get('cartItems'));$i++)
                                <div class="col-8">
                                {{Session::get('cartItems')[$i]['curso']}}
                                </div>
                                <div class="col-3 d-flex justify-content-end align-items-end font-weight-bold " style="color:#b71c1c ">
                                 $ {{ number_format(Session::get('cartItems')[$i]['Precio'] , 2)}}
                                </div>
                            @endfor
                    </div>
                    <hr >

                <h5 class="h5-responsive mb-3 text-center  font-weight-bold ">Total ({{count(Session::get('cartItems'))}} Estudios): <a  style="color:#b71c1c ">$ {{number_format($totalcarrito, 2) }}</a></h5>
                
                <button class="g-recaptcha btn btn-primary mt-2 w-95 mb-2 mx-4 mb-4 btn-sm" data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq" data-callback="transaccion" >Realizar Pago</button>
                           
            </div>
            </div>
    </div>

</main>

@endsection
@section('endscript')
<script>
function transaccion(e){
      
    //  $("#alertregistro").hide();
     
      var pasa = true;
      var mserror = "";    


      $.ajax( {
              data: {
                  "bill_to_forename:": $("#nombres").val(),
                  "bill_to_surname:": $("#apellidos").val(),
                  "bill_to_surname":$("email").val(),
                  "bill_to_phone":$("#telefono").val(),
                  "bill_to_address_linel" : $("#direccion").val(),
                  "bill_to_address_city": $("#ciudad").val(),
                  "bill_to_address_state": $("#estado").val(),
                  "bill_to_address_country":$("#pais").val(),
                  "bill_to_address_postal_code":$("#postal").val(), 
                  "amount":"{{$totalcarrito}}",      
                  "currency":"USD",              
                  "g-recaptcha-response": e,
                  '_token': $('meta[name="csrf-token"]').attr('content')
                  
              },
              url: "{{route('pay.pagar')}}",
              type: 'POST'
                             ,
              success: function(response){
                    var v =    response
                     $.ajax( {
                        data: v,
                            url: "https://testsecureacceptance.cybersource.com/silent/pay",
                            type: 'POST'
                                          ,
                            success: function(response){
                                  console.log(response)
                                },
                            error: function(response){
                          
                            }
                            
                        
                        }
      );
                  },
              error: function(response){
              /*     $("#alertregistro").show();
                  var str = "";

              for(x in response.responseJSON.errors){
                  var d = response.responseJSON.errors[x];
                  
                  for(var i=0;i<d.length;i++){                
                      str= str +'<b>'+d[i]+'</b><br></br>';               
                  }
              }
 */
                  
                      //$("#alertregistro").html(str);
              }
              
          
          }
      );
      grecaptcha.reset();
     
  }

</script>
@endsection
