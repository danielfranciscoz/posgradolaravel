
<div class="modal fade" id="modalusuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class=" ml-5 mr-5">
            
                    <i class="fa fa-user prefix grey-text"></i>
                    <label>usuario</label>
                    <input type="text" id="usuario" class="form-control" >

                    <i class="fa fa-cog prefix grey-text"></i>
                    <label>Constraseña</label>
                    <input type="password" id="password" class="form-control" >
                    
                    <i class="fa fa-leanpub prefix grey-text"></i>
                    <label>Tipo de usuario</label>
                    <select class="browser-default custom-select mb-4" id="isadmin">
                        <option value="" disabled>Seleccione un tipo</option>
                        <option value="0" >Usuario web</option>                        
                        <option value="1" >Administrador</option>
                        
                        
                    </select> 
                  
                    <i class="fa fa-user-circle prefix grey-text"></i>
                    <label>Primer Nombre</label>
                    <input type="text" id="primern" class="form-control" >
                    <label>Segundo Nombre</label>
                    <input type="text" id="segundon" class="form-control" >
                    <label>Primer Apellido</label>
                    <input type="text" id="primera" class="form-control" >
                    <label>Segundo Apellido</label>
                    <input type="text" id="segundoa" class="form-control" >

                    <i class="fa fa-id-card prefix grey-text"></i>
                    <label>DNI</label>
                    <input type="text" id="dni" class="form-control" >

                    <i class="fa fa-phone prefix grey-text"></i>
                    <label>Teléfono</label>
                    <input type="text" id="telefono" class="form-control" >

                    <i class="fa fa-mail-bulk prefix grey-text"></i>
                    <label>Suscripción</label>
                    <select class="browser-default custom-select mb-4" id="isadmin">
                        <option value="" disabled>Seleccione un tipo</option>
                        <option value="0" >No suscrito</option>                        
                        <option value="1" >Suscrito</option>
                        
                        
                    </select> 
                   
              
                             

            </div>

            
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertmodalusuarios">
                            
                            </div>
                            <a class="btn btn-sm btn-primary col-12 " id="but_upload">Guardar</a>
                        </div>
                        
                         
                           
                           </div>
                        <!--Grid column-->

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<style>
#upload_button {
  display: inline-block;
}
#upload_button input[type=file] {
  display:none;
}
</style>
