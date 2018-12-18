@extends('layout.app')
@section('title', 'Registro nuevo usuario')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12" >
                        </br>
                 <div id="registernow" class="white">
                    <div class="card mb-4 ">
                            <div class="card-body row mb-2 mt-2 mx-4">
                                <h4 class="h4-responsive font-weight-bold mt-2 text-justify">
                                    Bienvenido {{$user->email}}!
                                </h4>
                                <p class="text-justify mt-2">
                                    Hemos enviado un mensaje  a su correo Electrónico, Por favor revise su bandeja de entrada o Correos no deseado (spam). En dado caso que no fuese recibido el correo, presione el siguiente botón para volver a enviarselo.
                                    </p>
                                    <div class="d-flex justify-content-end w-100">
                                        <button class="btn btn-sm btn-primary mt-2 g-recaptcha"  class="g-recaptcha btn btn-primary my-4 btn-block"
                                    data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq"
                                    data-callback="submite">Reenviar correo</button>
                                    </div>
                            </div>
                        </div>   

                 </div>
            </div>
        </div>
    </div>
</main>

@endsection
@section('endscript')
    <script>
        function submite(e){
                $.ajax( {
                                data: {    
                                    "token": "{{$user->token}}",                
                                    "g-recaptcha-response": e,
                                    '_token': $('meta[name="csrf-token"]').attr('content')
                                    
                                },
                                url: "/account/remail",
                                type: 'POST'
                                            ,
                                success: function(response){
                                       if(response.message == "exito"){
                                            alert("true");
                                       }else{
                                        alert("false");
                                       }
                                    }
                }
                );
                grecaptcha.reset();
        }
    </script>
@endsection