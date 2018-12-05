<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">¡Comencemos a Aprender!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class=" ml-5 mr-5">
                <div class="md-form ">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="defaultForm-email" class="form-control validate" >
                    <label data-error="Incorrecto" data-success="Correcto" for="defaultForm-email">Correo Electronico</label>
                </div>

                <div class=" md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="La contraseña debe contener al menos una minuscula, una mayuscula y 6 caracteres">
                    <label data-error="Incorrecto" data-success="Correcto" for="defaultForm-pass">Contraseña</label>
                </div>

            </div>
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        
                        <button class="btn btn-sm btn-primary float-right " style="margin-left:50px">Iniciar Sesíon</button>
                        <br><br><br>
                         
                            <div class="flex-column">
                                <p href="../account/registro" class="
                                font-small d-flex justify-content-center float-md-left primary-text  float-sm-none">¿No tienes una cuenta?  </p>
                                <p href="../account/recuperacion" class="font-small  d-flex justify-content-center primary-text float-md-right float-sm-none">¿Olvido su Contraseña?  </p>
                            
                            </div>
                           </div>
                        <!--Grid column-->

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>

 $("#loginForm").submit(function(e){
                e.preventDefault();
                var user = $("#defaultForm-email").val();
                var pass = $("#defaultForm-pass").val();
                
                var passed = true
                if(user.length == 0){
                    $("#defaultForm-email").addClass("invalid");
                    passed = false;
                }
                if(pass.length == 0){
                    $("#defaultForm-pass").addClass("invalid");
                    passed = false;
                }

                if(passed) {
                    $.ajax(
                        {
                            data: {
                                "email": user,
                                "password":pass
                            },
                            url: "../process/login",
                            type: 'get',
                            success: function(response){
                                if(response.message =="sucess"){
                                    location.reload();
                                }else{
                                    
                                }
                            }
                        }
                    );
                }
              
              

            });
            

    

    
</script>