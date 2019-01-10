@extends('layout.app')
@section('title', 'Registro nuevo usuario')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12" >
                    
                 <div id="registernow" class="white">
                    <div class="card mb-4 ">
                            <div class="card-body  mb-2 mt-2 mx-4 ">
                                <h4 class="h4-responsive font-weight-bold mt-2 text-justify mb-4">
                                   Restablecimiento de contraseña
                                   {{csrf_field()}}
                                </h4>
                                <p class="mb-4 text-justify">Se enviará un vínculo para restablecer tu contraseña a la dirección de correo electrónico.</p>
                                <input type="email" id="email" class="form-control mb-2" placeholder="Correo Electrónico" required/>
                                <div class="d-flex justify-content-center">
                                <button
                                    class="g-recaptcha btn btn-primary btn-block w-25 text-center"
                                    data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq"
                                    data-callback="submite">
                                    Recuperar
                                </button>
                                </div>
                                <div class="alert alert-success col-12 mt-4" role="alert" id="alertreset">
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
 $("#alertreset").hide();

    function submite(e){
        $("#alertreset").hide();
        var str = "Se envió un mensaje de correo electrónico a "+$("#email").val()+". Sigue las instrucciones del mensaje y restablece tu contraseña.";
        $.ajax( {
           
                data: {                    
                    "email": $("#email").val(),
                    "g-recaptcha-response": e,
                    '_token': $('meta[name="csrf-token"]').attr('content')                                     
                },
                url: "{{route('emailresetear')}}",
                type: 'POST'
                               ,
                success: function(response){
                    $("#alertreset").show();                    
                        $("#alertreset").html(str);
                    },
                error: function(response){
                    $("#alertreset").show();
                                       
                        $("#alertreset").html(str);
                }
                
            
            }
        );
        grecaptcha.reset();
    }
</script>
@endsection