@extends('layout.app')
@section('title', 'Registro nuevo usuario')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12">
                        </br>
                <form class="text-center border border-light p-5 white">
                {{csrf_field()}}
                <h4 class="h4-responsive mb-4 text-primary">¡Inscribete y comienza a aprender con nosotros!</h4>
                <h6 class="h6-responsive mb-4">Esto solo tomará un par de minutos, por favor ten paciencia y completa toda la información.</h6>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" id="PrimerNombre" class="form-control" placeholder="Primer Nombre" required />
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" id="SegundoNombre" class="form-control" placeholder="Segundo Nombre"  /> 
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" id="PrimerApellido" class="form-control" placeholder="Primer Apellido" required />
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" id="SegundoApellido" class="form-control" placeholder="Segundo Apellido"  /> 
                    </div>
                </div>
                <input type="text" id="dni" class="form-control" placeholder="DNI/Cédula" aria-describedby="defaultRegisterFormPhoneHelpBlock" required/>
                </br>

                <!-- E-mail -->
                <input type="email" id="email" class="form-control mb-4" placeholder="Correo Electrónico" required/>

                <!-- Password -->
                <input type="password" id="password" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock" required/>
                <input type="password" id="repassword" class="form-control mt-4" placeholder="Repetir contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock" required />
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    Al menos 8 caracteres y 1 dígito
                </small>
                

                <!-- Phone number -->
                <input type="tel" id="telefono" class="form-control" placeholder="Número Telefónico" aria-describedby="defaultRegisterFormPhoneHelpBlock" required />
               

                <!-- Newsletter -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="boletin" checked>
                    <label class="custom-control-label" for="boletin">Suscríbite a nuestro boletin de noticias</label>
                </div>

                <!-- Sign up button -->

                 <button
                                class="g-recaptcha btn btn-primary my-4 btn-block"
                                data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq"
                                data-callback="submite">
                                Regístrate
                            </button>

                               <div class="alert alert-danger col-12" role="alert" id="alertregistro">
                                </div>

                <!-- Social register -->
               <!--  <p>or sign up with:</p>

                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-facebook"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-github"></i>
                </a>

                <hr> -->

                <!-- Terms of service -->
                <p>Al hacer clic en 
                    <em>Registrarse </em> estas aceptando nuestros                    
                    <a href="" target="_blank">términos de servicio</a>. </p>

                </form>
                <!-- Default form register -->
            </div>           
         </div>
    </div>
</main>
@endsection


@section('endscript')
<script>
$("#alertregistro").hide();
    function submite(e){
        $("#alertregistro").hide();
        var b = 0;

        if ($('#boletin').is(":checked"))
            {
                b = 1;
            }
        $.ajax( {
                data: {
                    "PrimerNombre": $("#PrimerNombre").val(),
                    "SegundoNombre": $("#SegundoNombre").val(),
                    "PrimerApellido":$("#PrimerApellido").val(),
                    "SegundoApellido":$("#SegundoApellido").val(),
                    "DNI" : $("#dni").val(),
                    "email": $("#email").val(),
                    "password": $("#password").val(),
                    "Telefono":$("#telefono").val(),
                    "isSuscript" : b,
                    "g-recaptcha-response": e,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                    
                },
                // header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "../account/registro",
                type: 'POST',
                success: function(response){
                    if(response.message =="success"){
                        //
                    }else{
                        
                        
                        
                    }
                },
                error: function(response){
                    $("#alertregistro").show();
                    var str = "";
                                        
                    for(var i=0;i<response.responseJSON.errors.email.length;i++){
                        
                        str= str +'<b>'+response.responseJSON.errors.email[i]+'</b><br></br>';                                  
                    }
                    
                        $("#alertregistro").html(str);
                }
                
            
            }
        );
       
    }

</script>
@endsection
