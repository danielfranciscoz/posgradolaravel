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
            <h4 class="font-weight-bold h4-responsive">Docentes</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal(true)"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold" onclick="openmodal(false)"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold" onclick="opendelete()"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombres Y Apellido</th>
                            <th>Linkedin</th>
                            <th>Profesión</th>
                            <th>Descripción</th>                           
                            <th>Imagen</th>
                            <th>Creado</th>
                        </tr>
                    </thead>
                   <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</main>

@include('cms.modalDocentes')
@include('cms.modaldelete')


@endsection

@section('endscript')

<script>

$("#alertmodaldocentes").hide();
$("#alertmodaldelete").hide();   
    var id = 0;
    var nombres = "";
    var profesion = "";
    var descripcion = "";
    var img_url = "";
    var linkedin = "";
 
    var nuevo = true;

    var table =  $('#table1').DataTable( {
        select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchdocentes')}}",
                "type": "POST",
                'data': {"_token": $('meta[name="csrf-token"]').attr('content')},        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "Nombres", "name": "Nombres" },
                    { "data": "LinkedIn_URL", "name": "LinkedIn_URL" , render: function (data) {
                           return  '<a  href= "'+data+'" target="_blank   "><i class="fa fa-linkedin-in fa-2x grey"></i></a>'
                    }},                    
                    { "data": "Profesion", "name": "Profesion" },
                    { "data": "Descripcion", "name": "Descripcion" },
                    { "data": "Image_URL", "name": "Image_URL", render: function (data) {
                        return  '<img src= "{{route('cursos.index')}}/'+data+'" class="img-fluid" />'
                    }},
                    { "data": "created_at", "name": "created_at" },
            ],
              
            @include('layout.lenguagetable')

        } );
        function openmodal(nuevo){
            this.nuevo = nuevo;
            if(nuevo==true){
                clear();
                $('#modaldocentes').modal('show');
            }else{
                if(id>0){
                    setedit();
                    $('#modaldocentes').modal('show');
                }
            }
        }

        function opendelete(){
            if(id>0){
                $('#modaldelete').modal('show');
            }
        }

        function clear(){
            $('#nombres').val("");
            $('#profesion').val("");
            $('#descripcion').val("");      
            $('#linkedin').val("");            
            $('#picturepreview').attr('src', '');   
            $('#file').val(null);                  

        }

        function setedit(){
            $('#nombres').val(nombres);
            $('#profesion').val(profesion);
            $('#descripcion').val(descripcion); 
            $('#linkedin').val(linkedin);           
            $('#file').val(null);
            $('#picturepreview').attr('src', "{{route('cursos.index')}}"+"/"+img_url);           

        }


        $("#but_upload").click(function(){
            if(nuevo){
                var fd = new FormData();
                var files = $('#file')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('Imagen',files);
                fd.append('Nombres',$('#nombres').val());
                fd.append('LinkedIn_URL',$('#linkedin').val());                
                fd.append('Profesion',$('#profesion').val());
                fd.append('Descripcion',$('#descripcion').val());
                
                
                $.ajax({
                    url: "{{route('admin.docentesSave')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modaldocentes").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodaldocentes").show();

                             if (typeof response.responseJSON.errors.Nombres != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Nombres.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Nombres[i]+'</b><br></br>';                                  
                                   }
                               }
                               if (typeof response.responseJSON.errors.LinkedIn_URL != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.LinkedIn_URL.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.LinkedIn_URL[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.Profesion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Profesion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Profesion[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }                           
                            if (typeof response.responseJSON.errors.Imagen != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodaldocentes").html(str);
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
                fd.append('LinkedIn_URL',$('#linkedin').val());                
                //fd.append('Imagen',files);
                fd.append('Imagen',files);
                fd.append('Nombres',$('#nombres').val());
                fd.append('Profesion',$('#profesion').val());
                fd.append('Descripcion',$('#descripcion').val());
                

                if(files==null){
                fd.append('Image_URL', img_url);
               }else{
                fd.append('Image_URL', "");
                fd.append('Imagen',files);
               }
               $.ajax({
                    url: "{{route('admin.docentesSave')}}/"+id,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modaldocentes").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodaldocentes").show();
                                          
                                    if (typeof response.responseJSON.errors.Nombres != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Nombres.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Nombres[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                               if (typeof response.responseJSON.errors.LinkedIn_URL != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.LinkedIn_URL.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.LinkedIn_URL[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                               if (typeof response.responseJSON.errors.Profesion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Profesion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Profesion[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }                           
                            if (typeof response.responseJSON.errors.Image_URL != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Image_URL.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Image_URL[i]+'</b><br></br>';                                  
                              }
                            }
                                    
                                    $("#alertmodaldocentes").html(str);
                    }
                });
             
            }
            });

            $("#btn_delete").click(function(){           
              
                $.ajax({
                    url: "{{route('admin.docentes')}}/"+id,
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
                                          
                                    if (typeof response.responseJSON.errors.Nombres != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.Nombres.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.Nombres[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.Profesion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Profesion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Profesion[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.Descripcion != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Descripcion.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Descripcion[i]+'</b><br></br>';                                  
                              }
                            }                           
                            if (typeof response.responseJSON.errors.Image_URL != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Image_URL.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Image_URL[i]+'</b><br></br>';                                  
                              }
                            }
                                    
                                    
                                    $("#alertmodaldelete").html(str);
                    }
                });
            });

            $('#modaldocentes').on('hidden.bs.modal', function (e) {
                $("#alertmodaldocentes").hide();
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
                 linkedin = table.row(this ).data().LinkedIn_URL ;
                 nombres = table.row(this ).data().Nombres ;
                 profesion = table.row(this ).data().Profesion ;
                 descripcion = table.row(this ).data().Descripcion ;
                 img_url = table.row(this ).data().Image_URL ;
                
            } );


        
</script>
@endsection