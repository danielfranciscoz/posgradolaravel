@extends('layout.cms')
@section('title', 'INICIO')
@section('content')
<style>

#table2_length{
    display:none;
}

#table2_filter{
        display:none;
    }
    
#table3_length{
    display:none;
}

#table3_filter{
        display:none;
    }

    #table4_length{
    display:none;
}

#table4_filter{
        display:none;
    }

#table5_length{
    display:none;
}

#table5_filter{
        display:none;
    }

    
#table6_length{
    display:none;
}

#table6_filter{
        display:none;
    }

#tabledocentes_length{
    display:none;
    }

#tabledocentes_filter{
        display:none;
    }

    #tablerequisitos_length{
    display:none;
    }

    #tablerequisitos_filter{
        display:none;
    }
    #tablemodalidades_length{
    display:none;
    }

    #tablemodalidades_filter{
        display:none;
    }
    #tablecompetencias_length{
    display:none;
    }

    #tablecompetencias_filter{
        display:none;
    }
    #tableetiquetas_length{
    display:none;
    }

    #tableetiquetas_filter{
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
                        <tr class="font-weight-bold"    >
                            <th>id</th>
                            <th>Curso</th>
                            <th>Categoría</th>
                            <th>Categoría</th>
                            <th>Publicidad</th>
                            <th>Introducción</th>
                            <th>Info Adiccional</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Temario</th>
                            <!-- <th>Creado</th> -->

                        </tr>
                    </thead>
                    <tbody></tbody>                 
                </table>
            </div>
<hr>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h6 class="font-weight-bold h4-responsive">Requisitos</h6>
                    <div class="table-responsive px-4 mt-4 mb-4">
                        <table id="table2" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="font-weight-bold">Requisito </th>
                                    
                                    <!-- <th>Creado</th> -->

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                 </div>
                 <div class="col-sm-12 col-md-4">
                    <h6 class="font-weight-bold h4-responsive">Modalidades</h6>
                    <div class="table-responsive px-4 mt-4 mb-4">
                        <table id="table3" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="font-weight-bold">Modalidad</th>
                                    <th class="font-weight-bold">Horario</th>
                                    
                                    <!-- <th>Creado</th> -->

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                 </div>
                 <div class="col-sm-12 col-md-4">
                    <h6 class="font-weight-bold h4-responsive">Competencias</h6>
                    <div class="table-responsive px-4 mt-4 mb-4">
                        <table id="table4" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="font-weight-bold">Competencia</th>
                                   
                                    
                                    <!-- <th>Creado</th> -->

                                </tr>
                            </thead>
                            <tbody></tbody>                 
                        </table>
                    </div>
                 </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                <h6 class="font-weight-bold h4-responsive">Etiquetas</h6>
                <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table5" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                        
                            <th class="font-weight-bold">Etiqueta</th>                           
                            <!-- <th>Creado</th> -->

                        </tr>
                    </thead>
                    <tbody></tbody>                 
                </table>
            </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h6 class="font-weight-bold h4-responsive">Docentes</h6>
                    <div class="table-responsive px-4 mt-4 mb-4">
                    <table id="table6" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>                              
                                <th class="font-weight-bold">Docente</th>                           
                                <!-- <th>Creado</th> -->

                            </tr>
                        </thead>
                        <tbody></tbody>                 
                    </table>
                </div>
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
loadtable2();
loadtable3();
loadtable4();
loadtable5();
loadtable6();
    var id = 0;
    var curso = "";
    var precio = 0;
    var categoria = "";  
    var img_url = "";
    var temario_url = "";
    var descripcionpublicidad = "";
    var descripcionintroduccion = "";
    var descripcionadicional = "";
    var nuevo = true;

    var table2;
    var table3;
    var table4;
    var table5;
    var table6;
    var tablerequisitos;
    var tableetiquetas;
    var tablemodalidades;
    var tablecompetencias;
    var tabledocentes;

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
                    { "data": "Categoria", "name": "Categoria",render: function (data) {
                        if(data==null){
                            return 'Maestría'
                        }else{
                            return data 
                        }
                      
                    }},
                    { "data": "Desc_Publicidad", "name": "Desc_Publicidad" },
                    { "data": "Desc_Introduccion", "name": "Desc_Introduccion" },
                    { "data": "InfoAdicional", "name": "InfoAdicional" },
                    { "data": "Precio", "name": "Precio",render: function (data) {
                        return '$ '+data 
                    }},
                    { "data": "Image_URL", "name": "Image_URL", render: function (data) {
                           return  '<img src= "{{route('cursos.index')}}/'+data+'" class="img-fluid" />'
                    }},
                    { "data": "Temario_URL", "name": "Temario_URL", render: function (data) {
                        return  '<a  href= "{{route('cursos.index')}}/'+data+'" target="_blank"><i class="fa fa-file-pdf fa-2x grey"></i></a>'
                    }},                    
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetable')
            

        } );

    
    function loadtable2(){
        table2 = $('#table2').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursosrequisitos')}}",
                "type": "POST",
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                     "id": id           
                },        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "Requisito", "name": "Requisito" }                  
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetableshort')
            

        } );

    }
    
    function loadtable3(){
        table3 = $('#table3').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursosmodalidades')}}",
                "type": "POST",
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                     "id": id           
                },        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "Modalidad", "name": "Modalidad" },
                    { "data": "Horario", "name": "Horario" }                  
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetableshort')
            

        } );

    }

    function loadtable4(){
        table4 = $('#table4').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursoscompetencias')}}",
                "type": "POST",
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                     "id": id           
                },        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "competencia", "name": "competencia" }
                               
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetableshort')
            

        } );

    }

    function loadtable5(){
        table5 = $('#table5').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursosetiquetas')}}",
                "type": "POST",
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                     "id": id           
                },        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                 
                    { "data": "Etiqueta", "name": "Etiqueta" }
                               
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetableshort')
            

        } );

    }
    
    
    function loadtable6(){
        table6 = $('#table6').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcursodocentes')}}",
                "type": "POST",
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                     "id": id           
                },        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                 
                    { "data": "Nombres", "name": "Nombres" }
                               
                    //{ "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetableshort')
            

        } );

    }

   
    tabledocentes = $('#tabledocentes').DataTable( {
        "columns": [                    
                    { "name": "id" ,"visible":false},
                 
                    { "name": "docente" }
                ],
        "pageLength": 50,
        @include('layout.lenguagetableshort')

    });

    tablerequisitos = $('#tablerequisitos').DataTable( {
        "columns": [                    
                    { "name": "id" ,"visible":false},
                 
                    { "name": "requisitos" }
                ],
        "pageLength": 50,
        @include('layout.lenguagetableshort')

    });

    tablemodalidades = $('#tablemodalidades').DataTable( {
        "columns": [                    
                    { "name": "id" ,"visible":false},
                 
                    { "name": "modalidad" },
                    { "name": "horario" }
                ],
        "pageLength": 50,
        @include('layout.lenguagetableshort')

    });

    tablecompetencias = $('#tablecompetencias').DataTable( {
        "columns": [                    
                    { "name": "id" ,"visible":false},                 
                    { "name": "competencia" }                    
                ],
        "pageLength": 50,
        @include('layout.lenguagetableshort')

    });

    
    tableetiquetas = $('#tableetiquetas').DataTable( {
        "columns": [                    
                    { "name": "id" ,"visible":false},                 
                    { "name": "etiqueta" }                    
                ],
        "pageLength": 50,
        @include('layout.lenguagetableshort')

    });



    

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
            $('#precio').val("");
            $('#file').val(null);
            $('#image').val(null);
            $('#picturepreview').attr('src', '');      
            $('#filepreview').attr('src', '');  
               
           
        }

        function setedit(){
            $('#curso').val(curso);
            $('#categoria').val(categoria);
            $('#precio').val(precio);
            $('#descripcionpublicidad').val(descripcionpublicidad);
            $('#descripcionadicional').val(descripcionadicional);
            $('#descripcionintroduccion').val(descripcionintroduccion);
            //$('#file').val(null);
            $('#filepreview').attr('src','{{route('cursos.index')}}/'+temario_url);                      
            $('#picturepreview').attr('src', "{{route('cursos.index')}}"+"/"+img_url);
            table2.clear().draw(); 
            table3.clear().draw();        
            table4.clear().draw();        
            table5.clear().draw();        
            table6.clear().draw();    
            for(var i=0;i<table2.rows().data().count();i++){
            tablerequisitos.row.add([table6.row(i).data().id,table6.row(i).data().Nombres]).draw();
           }
            for(var i=0;i<table3.rows().data().count();i++){
            tablemodalidades.row.add([table6.row(i).data().id,table6.row(i).data().Nombres]).draw();
           }
            for(var i=0;i<table4.rows().data().count();i++){
            tablecompetencias.row.add([table6.row(i).data().id,table6.row(i).data().Nombres]).draw();
           }
            for(var i=0;i<table5.rows().data().count();i++){
            tableetiquetas.row.add([table6.row(i).data().id,table6.row(i).data().Nombres]).draw();
           }

           for(var i=0;i<table6.rows().data().count();i++){
            tabledocentes.row.add([table6.row(i).data().id,table6.row(i).data().Nombres]).draw();
           }


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
                       // console.log(e.target.result);
                      $('#filepreview').attr('src', e.target.result);
                      
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
                 precio = table.row(this ).data().Precio ;
                table2.destroy();
                loadtable2();
                table3.destroy();
                loadtable3();
                table4.destroy();
                loadtable4();
                table5.destroy();
                loadtable5();
                table6.destroy();
                loadtable6();
        
        

    
                  
            } );


        
</script>
@endsection