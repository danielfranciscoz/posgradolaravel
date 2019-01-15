<div class="modal fade" id="modalcomentarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">Comentarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
             
            </script>
            <div class=" ml-5 mr-5">
            
                    <i class="fa fa-user prefix grey-text"></i>
                    <label>Estudiante</label>
                    <input type="text" id="estudiante" class="form-control" >
                    
             
                  
                    <i class="fa fa-graduation-cap prefix grey-text"></i>
                    <label>Profesión</label>
                    <input type="text" id="profesion" class="form-control">
                  
                    <i class="fa fa-globe prefix grey-text"></i>
                    <label>Pais</label>
                    <select class="browser-default custom-select mb-4" id="pais">
                        <option value="" disabled>Seleccione un pais</option>
                        
                    </select>      

              
                    <i class="fa fa-keyboard prefix grey-text"></i>
                    <label>Comentario</label>
                    <textarea type="text" id="comentario" class="md-textarea form-control" rows="3"></textarea>
 
                   
                
                        <div class="input-default-wrapper mt-3">

                            <span class="input-group-text mb-3" id="input1">Upload</span>

                            <input type="file" id="file-with-current" class="input-default-js">

                            <label class="label-for-default-js rounded-right mb-3" for="file-with-current"><span class="span-choose-file">Choose
                                file</span>

                            <div class="float-right span-browse">Browse</div>

                            </label>

                        </div>
                       

            </div>
            
            <div class="d-flex justify-content-center">
                
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertlogin">
                            
                            </div>
                            <button class="btn btn-sm btn-primary " id="btnsesion">Guardar</button>
                        </div>
                        
                         
                           
                           </div>
                        <!--Grid column-->

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
