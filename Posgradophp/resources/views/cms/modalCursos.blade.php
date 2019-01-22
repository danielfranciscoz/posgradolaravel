
<div class="modal fade" id="modalcursos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class=" ml-5 mr-5">
            
                    <i class="fa fa-graduation-cap prefix grey-text"></i>
                    <label>Curso</label>
                    <input type="text" id="curso" class="form-control" >
                    
                    <i class="fa fa-leanpub prefix grey-text"></i>
                    <label>Categoría</label>
                    <select class="browser-default custom-select mb-4" id="categoria">
                        <option value="" disabled>Seleccione una categoría</option>
                        <option value="0" >Posgrado</option>                        
                        <option value="1" >Curso de Espeliazación</option>
                        
                        
                    </select> 
                  
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <label>Descripción Publicidad</label>
                    <textarea type="text" id="descripcionpublicidad" class="md-textarea form-control" rows="3"></textarea>
                  
                    <i class="fa fa-keyboard prefix grey-text"></i>
                    <label>Descripción Introducción</label>
                    <textarea type="text" id="descripcionintroduccion" class="md-textarea form-control" rows="3"></textarea>
                  
                    <i class="fa fa-keyboard prefix grey-text"></i>
                    <label>Información Adicional</label>
                    <textarea type="text" id="descripcionadicional" class="md-textarea form-control" rows="3"></textarea>
                    
                   

                      <i class="fa fa-file-alt prefix grey-text"></i>
                    <label>Temario</label> <br>

                    <div class="input-default-wrapper mt-3 " id="upload_button_file">
                      

                        <input type="file" id="file" class="input-default-js" onchange="readURLfile(this);">

                        <label class="label-for-default-js rounded-right mb-3" for="file"><span class="span-choose-file btn btn-sm btn-primary">Subir Temario</span>

                        </label>

                    </div>
                    
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        * Formatos aceptados: pdf. <br>                      
                        * Peso Maximo: 10 megabytes.
                    </small>      

                    <i class="fa fa-image prefix grey-text"></i>
                    <label>Imagen</label> <br>

                   
                    <div class="input-default-wrapper mt-3 " id="upload_button_image">

                         <img id="picturepreview" src="#" alt="Sin Imagen" class="img-fluid"/>

                        <input type="file" id="image" class="input-default-js" onchange="readURLimage(this);">

                        <label class="label-for-default-js rounded-right mb-3" for="image"><span class="span-choose-file btn btn-sm btn-primary">Subir Imagen</span>

                            

                        </label>

                     </div>
                    
                     <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        * Formatos aceptados: jpeg,jpg,png. <br>
                        * Altura maxima: 270px, Anchura maxima 480px.<br>
                        * Peso Maximo: 2 megabytes.
                    </small>       

            </div>

            
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertmodalcursos">
                            
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