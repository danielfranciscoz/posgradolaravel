@extends('layout.cms')
@section('title', 'INICIO')
@section('content')
<style>
    #table1_filter{
        display:none;
    }
</style>

<main>
    <div class=" card white mt-5 mx-5 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Categorias</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal(true)"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold" onclick="openmodal(false)"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold" onclick="opendelete()"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Descripción Completa</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                   <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</main>

@include('cms.modalCategorias')
@include('cms.modaldelete')


@endsection

@section('endscript')

<script>

$("#alertmodalcategorias").hide();
$("#alertmodaldelete").hide();   
    var id = 0;
    var categoria = "";
    var tipo = "";
    var descripcion = "";
    var img_url = "";
    var descripcionlarga = "";
    var nuevo = true;

    var table =  $('#table1').DataTable( {
        select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcategorias')}}",
                "type": "POST",
                'data': {"_token": $('meta[name="csrf-token"]').attr('content')},        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "Categoria", "name": "Categoria" },
                    { "data": "isCursoPosgrado", "name": "isCursoPosgrado",render:function(data){
                        if (data==1) {
                            return 'Curso'
                        }else{
                            return 'Posgrado'
                        }
                    } },
                    { "data": "Descripcion", "name": "Descripcion" },
                    { "data": "Descripcion_larga", "name": "Descripcion_larga" },
                    { "data": "Image_URL", "name": "Image_URL", render: function (data) {
                        return  '<img src= "{{route('cursos.index')}}/'+data+'" class="img-fluid" />'
                    }},
            ],
              
            @include('layout.lenguagetable')

        } );
        function openmodal(nuevo){
            this.nuevo = nuevo;
            if(nuevo==true){
                clear();
                $('#modalcategorias').modal('show');
            }else{
                if(id>0){
                    setedit();
                    $('#modalcategorias').modal('show');
                }
            }
        }

        function opendelete(){
            if(id>0){
                $('#modaldelete').modal('show');
            }
        }

        function clear(){
            $('#categoria').val("");
            $('#tipo').val("");
            $('#descripcion').val("");
            $('#descripcionlarga').val("");
            $('#file').val(null);
            $('#picturepreview').attr('src', '');           

        }

        function setedit(){
            $('#categoria').val(categoria);
            $('#tipo').val(tipo);
            $('#descripcion').val(descripcion);
            $('#descripcionlarga').val(descripcionlarga);
            //$('#file').val(null);
            $('#picturepreview').attr('src', "{{route('cursos.index')}}"+"/"+img_url);           

        }


        $("#but_upload").click(function(){
            if(nuevo){
                var fd = new FormData();
                var files = $('#file')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('Imagen',files);
                fd.append('Categoria',$('#categoria').val());
                fd.append('isCursoPosgrado',$('#tipo').val());
                fd.append('Descripcion',$('#descripcion').val());
                fd.append('Descripcion_larga',$('#descripcionlarga').val());
                
                $.ajax({
                    url: "{{route('admin.categoriasSave')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalcategorias").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalcategorias").show();

                             if (typeof response.responseJSON.errors.Categoria != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Categoria.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Categoria[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.isCursoPosgrado != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isCursoPosgrado.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isCursoPosgrado[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Descripcion_Larga != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion_Larga.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion_Larga[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodalcategorias").html(str);
                    }
                });
            }
            else
            {
                var fd = new FormData();
                var files = $('#file')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('id',id);
                fd.append('_method','put');                
                //fd.append('Imagen',files);
                fd.append('Categoria',$('#categoria').val());
                fd.append('isCursoPosgrado',$('#tipo').val());
                fd.append('Descripcion',$('#descripcion').val());
                fd.append('Descripcion_larga',$('#descripcionlarga').val());

                if(files==null){
                fd.append('Image_URL', img_url);
               }else{
                fd.append('Image_URL', "");
                fd.append('Imagen',files);
               }
               $.ajax({
                    url: "{{route('admin.categoriasSave')}}/"+id,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalcategorias").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalcategorias").show();
                                          
                             if (typeof response.responseJSON.errors.Categoria != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Categoria.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Categoria[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.isCursoPosgrado != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isCursoPosgrado.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isCursoPosgrado[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Descripcion_Larga != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion_Larga.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion_Larga[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodalcategorias").html(str);
                    }
                });
             
            }
            });

            $("#btn_delete").click(function(){           
              
                $.ajax({
                    url: "{{route('admin.categorias')}}/"+id,
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
                                          
                             if (typeof response.responseJSON.errors.Categoria != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Categoria.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Categoria[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.isCursoPosgrado != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isCursoPosgrado.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isCursoPosgrado[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Descripcion_Larga != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion_Larga.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion_Larga[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }
                                    
                                    $("#alertmodaldelete").html(str);
                    }
                });
            });

            $('#modalcategorias').on('hidden.bs.modal', function (e) {
                $("#alertmodalcategorias").hide();
            }) 
            
            function readURL(input) {
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
                 categoria = table.row(this ).data().Categoria ;
                 tipo = table.row(this ).data().isCursoPosgrado ;
                 descripcion = table.row(this ).data().Descripcion ;
                 img_url = table.row(this ).data().Image_URL ;
                 descripcionlarga = table.row(this ).data().Descripcion_larga ;  
            } );


        
</script>
@endsection