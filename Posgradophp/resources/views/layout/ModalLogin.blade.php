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
                    <input type="password" id="defaultForm-pass" class="form-control validate">
                    <label data-error="Incorrecto" data-success="Correcto" for="defaultForm-pass">Contraseña</label>
                </div>

            </div>
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertlogin">
                            
                            </div>
                            <button class="btn btn-sm btn-primary " id="btnsesion">Iniciar Sesíon</button>
                        </div>
                        
                         
                            <div class="flex-column">
                                <p href="/account/registro" onclick="registroredirect()" class="font-small d-flex justify-content-center float-md-left primary-text  float-sm-none" style="cursor:hand">¿No tienes una cuenta?  </p>
                                <p href="/account/password/reset"  onclick="resetredirect()" class="font-small  d-flex justify-content-center primary-text float-md-right float-sm-none"  style="cursor:hand">¿Olvido su Contraseña?  </p>
                            
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

$("#alertlogin").hide();

function registroredirect(){
    window.location.href = "/account/registro";
}
function resetredirect(){
    window.location.href = "/account/password/reset";
}

 $("#loginForm").submit(function(e){
                e.preventDefault();
                $("#alertlogin").hide();
               
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
                            url: "/account/login",
                            type: 'get',
                            success: function(response){
                                if(response.message =="success"){
                                    location.reload();
                                }else{
                                   
                                    $("#alertlogin").show();
                                    $("#alertlogin").html("<b>"+response.message+"</b>");
                                   
                                }
                            },
                            error: function(response){
                                var str = "";
                                $("#alertlogin").show();
                            
                              
                                for(var i=0;i<response.responseJSON.errors.email.length;i++){
                                    
                                    str= str +'<b>'+response.responseJSON.errors.email[i]+'</b><br></br>';                                  
                                }
                                
                                $("#alertlogin").html(str);
                            }                            
                        
                        }
                    );

                }
              
              

            });
            
            
$('#modalLoginForm').on('hidden.bs.modal', function (e) {
    $("#alertlogin").hide();
})

</script>