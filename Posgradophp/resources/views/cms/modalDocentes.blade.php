
<div class="modal fade" id="modaldocentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">Docentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class=" ml-5 mr-5">
            
                    <i class="fa fa-user prefix grey-text"></i>
                    <label>Nombres y apellidos</label>
                    <input type="text" id="nombres" class="form-control" >
                    
                    <i class="fa fa-linkedin-in prefix grey-text"></i>
                    <label>Linkedin</label>
                    <input type="text" id="linkedin" class="form-control">

                    <i class="fa fa-graduation-cap prefix grey-text"></i>
                    <label>Profesión</label>
                    <input type="text" id="profesion" class="form-control">


                    <i class="fa fa-pencil prefix grey-text"></i>
                    <label>Descripción</label>                    
                    <textarea type="text" id="descripcion" class="md-textarea form-control" rows="3"></textarea>
                  
                 
                    <i class="fa fa-image prefix grey-text"></i>
                    <label>Imagen</label> <br>
                   
                    <div class="input-default-wrapper mt-3 " id="upload_button">

                    <img id="picturepreview" src="#" alt="Sin Imagen" class="img-fluid"/>

                        <input type="file" id="file" class="input-default-js" onchange="readURL(this);">

                        <label class="label-for-default-js rounded-right mb-3" for="file"><span class="span-choose-file btn btn-sm btn-primary">Subir Imagen</span>

                            

                        </label>

                     </div>
                     <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        * Formatos aceptados: jpeg,jpg,png. <br>
                        * Altura: 250px, Anchura: 250px.<br>
                        * Peso Maximo: 2 megabytes.
                    </small>
                    
                             

            </div>

            
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertmodaldocentes">
                            
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
