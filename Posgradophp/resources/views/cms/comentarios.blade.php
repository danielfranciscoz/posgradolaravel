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
            <h4 class="font-weight-bold h4-responsive">Comentarios</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal()"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Estudiante</th>
                            <th>Profesión</th>
                            <th>Pais</th>
                            <th>Foto</th>
                            <th>Comentario</th>
                            <th>Creado</th>

                        </tr>
                    </thead>
                    <tbody></tbody>                 
                </table>
            </div>
        </div>
    </div>

</main>



@include('cms.modalComentarios')

@endsection

@section('endscript')

<script>

$("#alertmodalcomentarios").hide();
    paises();
    var table = $('#table1').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchcomentarios')}}",
                "type": "POST",
                'data': {"_token": $('meta[name="csrf-token"]').attr('content')},        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "Nombre", "name": "Nombre" },
                    { "data": "Profesion", "name": "Profesion" },
                    { "data": "Desc_Pais", "name": "Desc_Pais" },
                    { "data": "Image_URL", "name": "Image_URL", render: function (data) {
                           return  '<img src= "{{route('cursos.index')}}/'+data+'" class="img-fluid" />'
                    }},
                    { "data": "Comentario", "name": "Comentario" },
                    { "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetable')

        } );

        function openmodal(){
            $('#modalcomentarios').modal('show');
        }

        function paises(){
            $.ajax(
                        {
                            
                            url: "https://restcountries.eu/rest/v2/",
                            type: 'get',
                            success: function(response){                             

                                response.forEach(function(element) {
                                    $('#pais').append($('<option>', { 
                                        value: element.name,
                                        text : element.name 
                                        }));
                                    });
                                  
                            }                                                       
                        
                        }
                    );
        }


        $("#but_upload").click(function(){
            
            var fd = new FormData();
            var files = $('#file')[0].files[0];          
            fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
            fd.append('Imagen',files);
            fd.append('Nombre',$('#estudiante').val());
            fd.append('Profesion',$('#profesion').val());
            fd.append('Desc_Pais',$('#pais').val());
            fd.append('Comentario',$('#comentario').val());
            
            $.ajax({
                url: "{{route('admin.comentariosSave')}}",
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                  
                   if(response.message=="exito."){
                    table.ajax.reload();
                   } $("#alertmodalcomentarios").show();
                
                },
                error: function(response){
                   
                    var str = "";
                                $("#alertmodalcomentarios").show();
                                for(var i=0;i<response.responseJSON.errors.Nombre.length;i++){
                                    
                                    str= str +'<b>'+response.responseJSON.errors.Nombre[i]+'</b><br></br>';                                  
                                }
                                
                            
                                for(var i=0;i<response.responseJSON.errors.Profesion.length;i++){
                                    
                                    str= str +'<b>'+response.responseJSON.errors.Profesion[i]+'</b><br></br>';                                  
                                }
                                for(var i=0;i<response.responseJSON.errors.Comentario.length;i++){
                                    
                                    str= str +'<b>'+response.responseJSON.errors.Comentario[i]+'</b><br></br>';                                  
                                }
                                
                                for(var i=0;i<response.responseJSON.errors.Imagen.length;i++){
                                    
                                    str= str +'<b>'+response.responseJSON.errors.Imagen[i]+'</b><br></br>';                                  
                                }
                                
                                $("#alertmodalcomentarios").html(str);
                }
            });
            });

            $('#modalcomentarios').on('hidden.bs.modal', function (e) {
                $("#alertmodalcomentarios").hide();
            })

//            fd.append('Image_URL',$('#Image_URL').val());

</script>
@endsection