
<div class="modal fade" id="modalcursos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class=" ml-5 mr-5 mt-4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <i class="fa fa-graduation-cap prefix grey-text"></i>
                        <label>Curso</label>
                        <input type="text" id="curso" class="form-control" >
                        
                        <i class="fa fa-leanpub prefix grey-text"></i>
                        <label>Categoría</label>
                        <select class="browser-default custom-select mb-4" id="categoria">

                            <option value="-1" disabled>Seleccione una categoría</option>
                            <option value="0" >Maestría</option>
                        
                            @for($i=0;$i<count($categoriaselect);$i++)
                            <option value="{{$categoriaselect[$i]->id}}" >{{$categoriaselect[$i]->Categoria}}</option>                        
                            @endfor
                            
                            
                        </select> 
                        <i class="fa fa-money prefix grey-text"></i>
                        <label>Precio:</label>
                        <input type="number" id="precio" class="form-control" >

                        <i class="fa fa-pencil prefix grey-text"></i>
                        <label>Descripción Publicidad</label>
                        <textarea type="text" id="descripcionpublicidad" class="md-textarea form-control" rows="3"></textarea>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <i class="fa fa-keyboard prefix grey-text"></i>
                        <label>Descripción Introducción</label>
                        <textarea type="text" id="descripcionintroduccion" class="md-textarea form-control" rows="3"></textarea>
                    
                        <i class="fa fa-keyboard prefix grey-text"></i>
                        <label>Información Adicional</label>
                        <textarea type="text" id="descripcionadicional" class="md-textarea form-control" rows="3"></textarea>
                        

                        <div class="custom-control custom-checkbox custom-control-inline mt-4">
                            <input type="checkbox" class="custom-control-input" id="ispresencial">
                            <label class="custom-control-label" for="ispresencial">Presencial</label>
                        </div>

                        <!-- Default inline 2-->
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="issemipresencial">
                            <label class="custom-control-label" for="issemipresencial">Semi-presencial</label>
                        </div>

                        <!-- Default inline 3-->
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="isvirtual">
                            <label class="custom-control-label" for="isvirtual">Virtual</label>
                        </div>
                    </div>                    

                </div>
                    
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6">
                        <i class="fa fa-file-alt prefix grey-text"></i>
                        <label>Temario</label> <br>
                        <div class="input-default-wrapper mt-3 " id="upload_button_file">
                    
                            <iframe id="filepreview" src=""  style="width:300; height:225;" frameborder="0"></iframe>

                            <input type="file" id="file" class="input-default-js" onchange="readURLfile(this);" accept="application/pdf">

                            <label class="label-for-default-js rounded-right mb-3" for="file"><span class="span-choose-file btn btn-sm btn-primary">Subir Temario</span>

                            </label>

                        </div>
                        
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            * Formatos aceptados: pdf. <br>                      
                            * Peso Maximo: 10 megabytes.
                        </small>      
                    </div>
                    <div class="col-sm-12 col-md-6">
                    <i class="fa fa-image prefix grey-text"></i>
                    <label>Imagen</label> <br>

                   
                    <div class="input-default-wrapper mt-3 " id="upload_button_image">

                         <img id="picturepreview" src="#" alt="Sin Imagen" class="img-fluid"  style="width:300; height:225;" />

                        <input type="file" id="image" class="input-default-js" onchange="readURLimage(this);"  accept="image/jpeg, image/png">

                        <label class="label-for-default-js rounded-right mb-3" for="image"><span class="span-choose-file btn btn-sm btn-primary">Subir Imagen</span>

                            

                        </label>

                     </div>
                    
                     <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        * Formatos aceptados: jpeg,jpg,png. <br>
                        * Altura maxima: 270px, Anchura maxima 480px.<br>
                        * Peso Maximo: 2 megabytes.
                    </small>   
                    </div>
                </div>
                
                <hr>
                <h6 class="h6-responsive font-weight-bold">Requisitos</h6>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                         <input type="text" id="requisitos" class="col-12 mb-4">
                        <a class="btn btn-sm green white-text font-weight-bold" onclick="addrequisito()">Agregar</a>
                        <a class="btn btn-sm red white-text font-weight-bold"  onclick="delrequisito()">Eliminar</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                    <div class="table-responsive">
                        <table id="tablerequisitos" class="table" style="width:100%;heigth:500px">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Requisitos</th>                                

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                    </div>

                        

                </div>

                <hr>
                <div id="divmodalidades">
                    <h6 class="h6-responsive font-weight-bold">Modalidades</h6>
                    <div class="row mt-4">
                        <div class="col-md-6 col-sm-12">
                        <input type="text" id="modalidades" class="col-6 mb-4"  placeholder="Modalidad">
                        <input type="text" id="horarios" class="col-6 mb-4"  placeholder="Horario">
                            <a class="btn btn-sm green white-text font-weight-bold" onclick="addmodalidad()">Agregar</a>
                            <a class="btn btn-sm red white-text font-weight-bold"  onclick="delmodalidad()" > Eliminar</a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                        <div class="table-responsive">
                            <table id="tablemodalidades" class="table" style="width:100%;heigth:500px">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Modalidad</th> 
                                        <th>Horario</th>                               

                                    </tr>
                                </thead>
                                <tbody></tbody>                 
                            </table>
                        </div>
                        </div>

                            

                    </div>
                </div>

                <hr>
                <h6 class="h6-responsive font-weight-bold">Competencias</h6>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <input type="text" id="competencias" class="col-12 mb-4">
                        <a class="btn btn-sm green white-text font-weight-bold" onclick="addcompetencia()">Agregar</a>
                        <a class="btn btn-sm red white-text font-weight-bold" onclick="delcompetencia()" >Eliminar</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                    <div class="table-responsive">
                        <table id="tablecompetencias" class="table" style="width:100%;heigth:500px">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Competencia</th>                                

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                    </div>

                        

                </div>

                <hr>
                <h6 class="h6-responsive font-weight-bold">Etiquetas</h6>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <select class="browser-default custom-select mb-4" id="etiquetas">

                        <option value="-1" disabled>Seleccione una etiqueta</option>
                      
                        @for($i=0;$i<count($etiquetasselect);$i++)
                        <option value="{{$etiquetasselect[$i]->id}}" >{{$etiquetasselect[$i]->Etiqueta}}</option>                        
                        @endfor

                        </select> 
                        <a class="btn btn-sm green white-text font-weight-bold" onclick="addetiqueta()">Agregar</a>
                        <a class="btn btn-sm red white-text font-weight-bold"  onclick="deletiqueta()" >Eliminar</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                    <div class="table-responsive">
                        <table id="tableetiquetas" class="table" style="width:100%;heigth:500px">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Etiqueta</th>                                

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                    </div>

                        

                </div>

                 
                <hr>
                <h6 class="h6-responsive font-weight-bold">Docentes</h6>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <select class="browser-default custom-select mb-4" id="docentes">

                        <option value="-1" disabled>Seleccione un Docente</option>
                      
                        @for($i=0;$i<count($docentesselect);$i++)
                        <option value="{{$docentesselect[$i]->id}}" >{{$docentesselect[$i]->Nombres}}</option>                        
                        @endfor

                        </select> 
                        <a class="btn btn-sm green white-text font-weight-bold" onclick="adddocente()">Agregar</a>
                        <a class="btn btn-sm red white-text font-weight-bold"  onclick="deldocente()" >Eliminar</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="table-responsive">
                            <table id="tabledocentes" class="table" style="width:100%;heigth:500px">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Docente</th>                                

                                    </tr>
                                </thead>
                                <tbody></tbody>                 
                            </table>
                        </div>
                    </div>

                        

                </div>
                <hr>
                <h6 class="h6-responsive font-weight-bold">Tematicas</h6>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                    <input type="text" id="tematicas" class="col-5 mb-4" placeholder="tematica">
                    <input type="text" id="duracion" class="col-5 mb-4" placeholder="duracion">
                        <a class="btn btn-sm green white-text font-weight-bold" onclick="addtematica()">Agregar</a>
                        <a class="btn btn-sm red white-text font-weight-bold"  onclick="deltematica()" >Eliminar</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="table-responsive">
                            <table id="tabletematicas" class="table" style="width:100%;heigth:500px">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Tematica</th>  
                                        <th>Horario</th>                               

                                    </tr>
                                </thead>
                                <tbody></tbody>                 
                            </table>
                        </div>
                    </div>

                        

                </div>

                       

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
#upload_button_file {
  display: inline-block;
}
#upload_button_file input[type=file] {
  display:none;
}

#upload_button_image {
  display: inline-block;
}
#upload_button_image input[type=file] {
  display:none;
}

</style>
