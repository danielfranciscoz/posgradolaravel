@extends('layout.app')
@section('title', 'Pagando estudios...')
@section('content')

@php $totalcarrito=0;
      if(is_array(Session::get('cartItems'))){
            for($i=0;$i<count(Session::get('cartItems'));$i++)
            {
                    $totalcarrito = $totalcarrito + (Session::get('cartItems')[$i]['Precio']);
            }
      }
        
            
@endphp
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
</style>
<form id="formpago">
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
                <div class="card white lighten-4 mb-4 mt-2 col-12 ">
                     <div class="card-body row ">
                     <h5 class="h5-responsive font-weight-bold col-12 mb-4">Información de facturación</h5>
                     <label class="col-12">Nombres:</label>
                        <input type="text" id="nombres" class="form-control mb-3 col-12 grey lighten-4  " placeholder="Nombres*" value="{{$estudiante->PrimerNombre.' '.$estudiante->SegundoNombre}}" required />
                   
                        <label class="col-12">Apellidos:</label>
                        <input type="text" id="apellidos" class="form-control mb-3 col-12 grey lighten-4" placeholder="Apellidos*" value="{{$estudiante->PrimerApellido.' '.$estudiante->SegundoApellido}}"  required /> 
                        </br>

                <label class="col-12">Correo Electrónico:</label>
                <input type="email" id="email"  autocomplete="email" class="form-control mb-3 col-12 grey lighten-4" placeholder="Correo Electrónico*" value="{{Auth::user()->email}}" required readOnly='readOnly'/>

                <label class="col-12">Número Telefónico:</label>
                <input type="tel" id="telefono" autocomplete="tel" class="form-control grey lighten-4" placeholder="Número Telefónico*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required value="{{$estudiante->Telefono}}" />
               
                <label class="col-12">Pais:</label>
                <select class="browser-default custom-select grey lighten-4 " id="pais" required >
                        <option value="" disabled>Seleccione un pais</option>
                    </select>      
                <!-- <input type="text" id="pais" autocomplete="country-name" class="form-control" autocomplete="country-name" placeholder="Pais*" aria-describedby="defaultRegisterFormPhoneHelpBlock"   />
                -->                
                <label class="col-12">Estado:</label>
                <select class="browser-default custom-select grey lighten-4" id="estado" required >
                        <option value="" disabled>Seleccione un estado</option>
                    </select>  
               <!--  <input type="text" id="estado" autocomplete="address-level1" class="form-control" autocomplete="" placeholder="Provincia o estado*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
 -->
                <label class="col-12">Ciudad:</label>
                <input type="text" id="ciudad" autocomplete="address-level2" class="form-control grey lighten-4" placeholder="Ciudad*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
                <label class="col-12">Dirección:</label>
                <input type="text" id="direccion" autocomplete="street-address" class="form-control grey lighten-4" placeholder="Dirección de Facturación*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
               
               
                <label class="col-12">Codigo Postal:</label>
                <input type="text" id="postal"   autocomplete="postal-code" class="form-control grey lighten-4" autocomplete="postal-code" placeholder="Codigo Apostal*" aria-describedby="defaultRegisterFormPhoneHelpBlock" required  />
               
            <a class="col-12 mt-2 text-right">Los campos indicados con (*) son obligatorios</a>

            </div>
          
            </div>
            <div class="card white mb-4 mt-2 col-12 ">
                     <div class="card-body row mx-2">
                     <h5 class="h5-responsive font-weight-bold col-6 mb-4">Información de tarjeta de crédito o débito</h5>
                     <label class="col-12">Tarjeta de Credito:</label>
                     <!-- <select class="browser-default custom-select " id="tipotarjeta" required >
                        <option value="" disabled>**Tipo de tarjeta </option>
                        <option value="01" disabled>Visa </option>
                        <option value="" disabled>MasterCard</option>
                        <option value="" disabled>Dinner Club </option>
                     </select>   -->
                     <input type="text" autocomplete="cc-number" id="tarjeta" class="form-control col-12 grey lighten-4" placeholder="Numero de Tarjeta*"  required />
                     <label class="col-12">Nombre del Titular:</label>
                     <input type="text" id="nombre"  autocomplete="cc-name" class="form-control col-12 grey lighten-4" placeholder="Nombres y apellidos*"  required />
                     <label class="col-12">Fecha de Vencimiento:</label>
                     <input type="text" autocomplete="cc-exp-month" id="mes" class="form-control col-6   grey lighten-4" placeholder="Mes de vencimiento/MM*"  required />
         
                     <input type="text" autocomplete="cc-exp-year" id="año" class="form-control col-6 grey lighten-4" placeholder="Año de vencimiento/YYYY*"  required />
                     <!-- <label class="col-12">CVC:</label>
                     <input type="text" id="tarjeta" class="form-control  col-12 grey lighten-2" placeholder="Codigo de Seguridad*"  required />
 -->

                     </div>
             </div>
            
        </div>
       <div class="col-md-4 col-sm-12 mb-4 mt-2 ">
        <div class="card  white sticky-top" >
        <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Detalle de Pago</h5>
                    <div class="row mt-4 mx-2">
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
                
                <div class="d-flex justify-content-center align-items-center text-justify row container ml-1 mb-4">
                        
                    <div class="spinner-border text-primary " role="status" id="spinner">
                        <span class="sr-only">Cargando...</span>
                    </div>

                    <div class="alert alert-danger col-12 px-4" role="alert" id="alertpago">
                            
                    </div>
                    <button id="btn-pago" class="g-recaptcha btn btn-primary mt-2 w-95 mb-2 mx-4 mb-4 btn-sm" data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq" data-callback="transaccion" >Realizar Pago</button>
                           

                  <!--   <img  src="{{route('cursos.index')}}/img/ssl.jpg" class="img-fluid " style="width:150; height:50;"/> -->
                  
                </div>


                
            </div>
            </div>
    </div>
    
    <!-- <form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/silent/pay" method="post">
      <input type="hidden" id="access_key" name="access_key" value="e9507abf9c1738e1a90162961d914987">
      <input type="hidden" id="profile_id" name="profile_id" value="B17CEE09-AA21-4C11-AD83-06CEA30FA859">
      <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="5c892d78becb9">
      <input type="hidden" id="signed_field_names" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code">
      <input type="hidden" id="unsigned_field_names" name="unsigned_field_names" value="card_type,card_number,card_expiry_date">
      <input type="hidden" id="signed_date_time" name="signed_date_time" value="">
      <input type="hidden" id="locale" name="locale" value="en">
      <input type="hidden" id="transaction_type" name="transaction_type" value="authorization">
      <input type="hidden" id="reference_number" name="reference_number" value="1552493950955">
      <input type="hidden" id="amount" name="amount" value="100.00">
      <input type="hidden" id="currency" name="currency" value="USD">
      <input type="hidden" id="payment_method" name="payment_method" value="card">
      <input type="hidden" id="bill_to_forename" name="bill_to_forename" value="John">
      <input type="hidden" id="bill_to_surname" name="bill_to_surname" value="Doe">
      <input type="hidden" id="bill_to_email" name="bill_to_email" value="null@cybersource.com">
      <input type="hidden" id="bill_to_phone" name="bill_to_phone" value="02890888888">
      <input type="hidden" id="bill_to_address_line1" name="bill_to_address_line1" value="1 Card Lane">
      <input type="hidden" id="bill_to_address_city" name="bill_to_address_city" value="My City">
      <input type="hidden" id="bill_to_address_state" name="bill_to_address_state" value="CA">
      <input type="hidden" id="bill_to_address_country" name="bill_to_address_country" value="US">
      <input type="hidden" id="bill_to_address_postal_code" name="bill_to_address_postal_code" value="94043">
      <input type="hidden" id="submit" name="submit" value="Submit">
      <input type="hidden" id="signature" name="signature" value="">
      <input type="hidden" name="card_type" value="001"><br>
      <input type="hidden" name="card_number" value="4242424242424242"><br>
      <input type="hidden" name="card_expiry_date" value="11-2020"><br>
      <input type="submit" id="setsubmit" value="Confirm" style="display:none"/>
</form> -->
</main>
<form>
@endsection
@section('endscript')
<script>
$("#alertpago").hide();
$("#spinner").hide();
paises();

$("#formpago").submit(function(e){
        e.preventDefault();
    });



function transaccion(e){
  $( "#formpago" ).submit();
    //  $("#alertregistro").hide();
     
      var pasa = true;
      var mserror = "";  
      var str  = "";  
      $("#alertpago").hide();
      $("#spinner").show();
      $("#btn-pago").hide();
      $.ajax( {
              data: {
                  "bill_to_forename": $("#nombres").val(),
                  "bill_to_surname": $("#apellidos").val(),
                  "bill_to_email":$("#email").val(),
                  "bill_to_phone":$("#telefono").val(),
                  "bill_to_address_line1" : $("#direccion").val(),
                  "bill_to_address_city": $("#ciudad").val(),
                  "bill_to_address_state": $("#estado").val(),
                  "bill_to_address_country":$("#pais").val(),
                  "bill_to_address_postal_code":$("#postal").val(), 
                  "card_name":$("#nombre").val(),
                  "card_type":$("#tipotarjeta").val(),
                    "card_number":$("#tarjeta").val(),
                    "expirationMonth":$("#mes").val(), 
                    "expirationYear": $("#año").val(), 
                  "amount":"{{$totalcarrito}}", 
                 
                 @php
                    for($i=0;$i<count(Session::get('cartItems'));$i++){
                            echo('"curso['.$i.']":'.Session::get('cartItems')[$i]['id'].',');
                    }
                 @endphp

                  "currency":"USD",              
                  "g-recaptcha-response": e,
                  '_token': $('meta[name="csrf-token"]').attr('content')
                  
              },
              url: "{{route('pay.pagar')}}",
              type: 'POST'
                             ,
              success: function(response){
              
               

                  if(response.resultado="Exito"){
                     window.location.href = "{{route('cursos.index')}}/account/pagocarrito/"+response.transactionCode; 
                  }else{
                    var str = "<b> Hubo un error en la transacción por favor intente de nuevo. </b>";
                  }

                    /* var v =    response;

                    $("#transaction_uuid").val(response.transaction_uuid);
                    $("#signed_date_time").val(response.signed_date_time);
                    $("#reference_number").val(response.reference_number);                    
                    $("#signature").val(response.signature);
                    $("#amount").val(response.amount);
                    $("#bill_to_forename").val(response.bill_to_forename);
                  
                   
               
                    $("#bill_to_surname").val(response.bill_to_surname);
                    $("#bill_to_email").val(response.bill_to_email);
                    $("#bill_to_phone").val(response.bill_to_phone);
                    $("#bill_to_address_line1").val(response.bill_to_address_line1);
                    $("#bill_to_address_city").val(response.bill_to_address_city);
                    $("#bill_to_address_state").val(response.bill_to_address_state);
                    $("#bill_to_address_country").val(response.bill_to_address_country);
                    $("#bill_to_address_postal_code").val(response.bill_to_address_postal_code);
 */
                   /*  $("#card_type").val($("#card").val()),
                    $("#card_number").val($("#tarjeta").val()),
                    $("#card_expiry_date").val($("#mes").val() +"-"+ $("#año").val()),  */
                  /*   setTimeout(function(){   
                       $("#setsubmit").click()
                      }, 1500); */
                   
                    /*  $.ajax( {
                        data: v,
                       
                            url: "https://testsecureacceptance.cybersource.com/silent/pay",
                            type: 'POST',
                            success: function(response){
                                  console.log(response)
                                },
                            error: function(response){
                          
                            }
                            
                        
                        }
                     ); */
                     $("#spinner").hide();
                     $("#btn-pago").show();
                  },
              error: function(response){
                console.log(response);

                 str = "";
                                    $("#alertpago").show();
                                    if (typeof response.responseJSON.errors.bill_to_forename != "undefined") {
                                   
                                    
                                        for(var i=0;i<response.responseJSON.errors.bill_to_forename.length;i++){
                                            
                                            str= str +'<b>'+response.responseJSON.errors.bill_to_forename[i]+'</b><br></br>';                                  
                                        }
                                    }

                                    if (typeof response.responseJSON.errors.bill_to_surname != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_surname.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_surname[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_email != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_email.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_email[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_phone != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_phone.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_phone[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_address_line1 != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_address_line1.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_address_line1[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_address_city != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_address_city.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_address_city[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_address_state != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_address_state.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_address_state[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_address_country != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_address_country.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_address_country[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.bill_to_address_postal_code != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.bill_to_address_postal_code.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.bill_to_address_postal_code[i]+'</b><br></br>';                                  
                                   }
                               }

                               if (typeof response.responseJSON.errors.amount != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.amount.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.amount[i]+'</b><br></br>';                                  
                                   }
                               }
                               if (typeof response.responseJSON.errors.card_number != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.card_number.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.card_number[i]+'</b><br></br>';                                  
                                   }
                               }
                               if (typeof response.responseJSON.errors.expirationMonth != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.expirationMonth.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.expirationMonth[i]+'</b><br></br>';                                  
                                   }
                               }
                               if (typeof response.responseJSON.errors.expirationYear != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.expirationYear.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.expirationYear[i]+'</b><br></br>';                                  
                                   }
                               }
                               if (typeof response.responseJSON.errors.expirationYear != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.expirationYear.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.expirationYear[i]+'</b><br></br>';                                  
                                   }
                               }
                               

                  $("#alertpago").html(str);
                  $("#spinner").hide();
                  $("#btn-pago").show();
                           
              }
              
          
          }
      );
      grecaptcha.reset();
     
  }
  function paises(){
            $.ajax(
                        {
                            
                            url: "https://restcountries.eu/rest/v2/",
                            type: 'get',
                            success: function(response){                             

                                response.forEach(function(element) {
                                    $('#pais').append($('<option>', { 
                                        value: element.alpha2Code,
                                        text : element.name 
                                        }));
                                    });
                                  
                            }                                                       
                        
                        }
                    );
        }


        async function ciudades(codigo){
          $('option', '#estado').remove();
          var dd =  await totalciudad(codigo);
          var total = dd.metadata.totalCount   ;                                  
                                        
          var coeficient =  Math.ceil(total/10) ;            
          console.log(coeficient);
          for(var i=0;i<coeficient;i++){

              await busquedaciudad(codigo,i);
          }
        }
                 function  totalciudad(codigo){
                                    return $.ajax(
                                      {   url: "http://geodb-free-service.wirefreethought.com/v1/geo/countries/"+codigo+"/regions?offset=0&limit=10&languageCode=es",
                                          type: 'get',
                                          success: function(response){     
                                                                              
                                          }                                                       
                                      }
                                  );   
                   }

                   function  busquedaciudad(codigo,i){
                      $.ajax( {                           
                        url: "http://geodb-free-service.wirefreethought.com/v1/geo/countries/"+codigo+"/regions?offset="+(i*10)+"&limit=10&languageCode=es",
                            type: 'get',
                            success: function(responsee){                             
                              
                                responsee.data.forEach(function(elemente) {
                                    $('#estado').append($('<option>', { 
                                        value: elemente.isoCode,
                                        text : elemente.name 
                                        }));
                                    });                               
                            }                                                  
                        }
                      );
                    }

                   
        


$('#pais').on('change', function() {
  ciudades( this.value );
});



</script>
@endsection
