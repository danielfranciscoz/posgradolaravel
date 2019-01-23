@extends('layout.cms')
@section('title', 'INICIO')
@section('content')
<style>
    #table1_filter{
        display:none;
    }
</style>
<main>

    <div class=" card white mt-5 mx-4 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Cursos</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal(true)"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold" onclick="openmodal(false)"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold" onclick="opendelete()"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Curso</th>
                            <th>Categoría</th>
                            <th>Categoría</th>
                            <th>Publicidad</th>
                            <th>Introducción</th>
                            <th>Info Adiccional.</th>
                            <th>Imagen</th>
                            <th>Temario</th>
                            <th>Creado</th>

                        </tr>
                    </thead>
                    <tbody></tbody>                 
                </table>
            </div>
        </div>
    </div>

</main>



@include('cms.modalCursos')
@include('cms.modaldelete')


@endsection

@section('endscript')

<script>

$("#alertmodalcursos").hide();
$("#alertmodaldelete").hide();
   
    var id = 0;
    var curso = "";
    var categoria = "";  
    var img_url = "";
    var temario_url = "";
    var descripcionpublicidad = "";
    var descripcionintroduccion = "";
    var descripcionadicional = "";
    var nuevo = true;

    var table = $('#table1').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursos')}}",
                "type": "POST",
                'data': {"_token": $('meta[name="csrf-token"]').attr('content')},        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "NombreCurso", "name": "NombreCurso" },
                    { "data": "categoria_id", "name": "categoria_id" ,"visible":false},
                    { "data": "Categoria", "name": "Categoria" ,"visible":false},
                    { "data": "Desc_Publicidad", "name": "Desc_Publicidad" },
                    { "data": "Desc_Introduccion", "name": "Desc_Introduccion" },
                    { "data": "InfoAdicional", "name": "InfoAdicional" },
                    { "data": "Image_URL", "name": "Image_URL", render: function (data) {
                           return  '<img src= "{{route('cursos.index')}}/'+data+'" class="img-fluid" />'
                    }},
                    { "data": "Temario_URL", "name": "Temario_URL", render: function (data) {
                           return  '<a  src= "{{route('cursos.index')}}/'+data+'"><i class="fa fa-file-pdf fa-2x grey"></i></a>'
                    }},                    
                    { "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetable')
            

        } );

        function openmodal(nuevo){
            this.nuevo = nuevo;
            if(nuevo==true){
                clear();
                $('#modalcursos').modal('show');
            }else{
                if(id>0){
                    setedit();
                    $('#modalcursos').modal('show');
                }
            }
        }

        function opendelete(){
            if(id>0){
                $('#modaldelete').modal('show');
            }
        }

        function clear(){
            $('#curso').val("");
            $('#categoria').val("");
            $('#descripcionpublicidad').val("");
            $('#descripcionadicional').val("");
            $('#descripcionintroduccion').val("");
            $('#file').val(null);
            $('#image').val(null);
            $('#picturepreview').attr('src', '');           

        }

        function setedit(){
            $('#curso').val(curso);
            $('#categoria').val(categoria);
            $('#descripcionpublicidad').val(descripcionpublicidad);
            $('#descripcionadicional').val(descripcionadicional);
            $('#descripcionintroduccion').val(descripcionintroduccion);
            //$('#file').val(null);
            $('#picturepreview').attr('src', "{{route('cursos.index')}}"+"/"+img_url);           

        }

        

        $("#but_upload").click(function(){
            if(nuevo){
                var fd = new FormData();
                var files = $('#file')[0].files[0]; 
                var images = $('#image')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('Imagen',images);
                fd.append('Temario',files);
                fd.append('NombreCurso',$('#curso').val());
                fd.append('categoria_id',$('#categoria').val());
                fd.append('Desc_Publicidad',$('#descripcionpublidad').val());
                fd.append('Desc_Introduccion',$('#descripcionintroduccion').val());
                fd.append('InfoAdicional',$('#descripcionadicional').val());
                
                $.ajax({
                    url: "{{route('admin.cursosSave')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){                    
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalcursos").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalcursos").show();
                                    if (typeof response.responseJSON.errors.NombreCurso != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.NombreCurso.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.NombreCurso[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.categoria_id != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.categoria_id.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.categoria_id[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Desc_Publicidad != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Publicidad.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Publicidad[i]+'</b><br></br>';                                  
                              }
                            }
                            
                            if (typeof response.responseJSON.errors.Desc_Introduccion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Introduccion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Introduccion[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.InfoAdicional != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.InfoAdicional.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.InfoAdicional[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.Temario != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Temario.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Temario[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodalcursos").html(str);
                    }
                });
            }
            else
            {
                var fd = new FormData();
                var files = $('#file')[0].files[0];     
                var images = $('#image')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('id',id);
                fd.append('_method','put');            
               
                fd.append('NombreCurso',$('#curso').val());
                fd.append('categoria_id',$('#categoria').val());
                fd.append('Desc_Publicidad',$('#descripcionpublidad').val());
                fd.append('Desc_Introduccion',$('#descripcionintroduccion').val());
                fd.append('InfoAdicional',$('#descripcionadicional').val());

               if(images==null){
                fd.append('Image_URL', img_url);
               }else{
                fd.append('Image_URL', "");
                fd.append('Imagen',images);
               }

               if(files==null){
                fd.append('Temario_URL', img_url);
               }else{
                fd.append('Temario_URL', "");
                fd.append('Temario',files);
               }
               $.ajax({
                    url: "{{route('admin.cursosSave')}}/"+id,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalcursos").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalcursos").show();
                                    if (typeof response.responseJSON.errors.NombreCurso != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.NombreCurso.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.NombreCurso[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.categoria_id != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.categoria_id.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.categoria_id[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Desc_Publicidad != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Publicidad.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Publicidad[i]+'</b><br></br>';                                  
                              }
                            }
                            
                            if (typeof response.responseJSON.errors.Desc_Introduccion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Introduccion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Introduccion[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.InfoAdicional != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.InfoAdicional.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.InfoAdicional[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.Temario != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Temario.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Temario[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodalcursos").html(str);
                    }
                });
             
            }
            });

            $("#btn_delete").click(function(){           
              
                $.ajax({
                    url: "{{route('admin.cursos')}}/"+id,
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        'id':id,
                        '_method': 'delete',
                       '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modaldelete").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodaldelete").show();
                                    if (typeof response.responseJSON.errors.NombreCurso != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.NombreCurso.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.NombreCurso[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.categoria_id != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.categoria_id.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.categoria_id[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Desc_Publicidad != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Publicidad.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Publicidad[i]+'</b><br></br>';                                  
                              }
                            }
                            
                            if (typeof response.responseJSON.errors.Desc_Introduccion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Desc_Introduccion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Desc_Introduccion[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.InfoAdicional != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.InfoAdicional.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.InfoAdicional[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.Temario != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Temario.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Temario[i]+'</b><br></br>';                                  
                              }
                            }
                                    
                                    $("#alertmodaldelete").html(str);
                    }
                });
            });

            $('#modalcursos').on('hidden.bs.modal', function (e) {
                $("#alertmodalcursos").hide();
            }) 
            
            function readURLfile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                       // $('#picturepreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURLimage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#picturepreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#table1 tbody').on( 'click', 'tr', function () {
                 id = table.row(this ).data().id ;
                 curso = table.row(this ).data().NombreCurso ;
                 categoria = table.row(this ).data().categoria_id ;
                 descripcionpublicidad = table.row(this ).data().Desc_Publicidad ;
                 descripcionintroduccion = table.row(this ).data().Desc_Introduccion ;
                 descripcionadicional = table.row(this ).data().InfoAdicional ;
                 img_url = table.row(this ).data().Image_URL ;
                 temario_url = table.row(this ).data().Temario_URL ;
                  
            } );


        
</script>
@endsection