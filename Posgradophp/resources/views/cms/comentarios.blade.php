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
            <h4 class="font-weight-bold h4-responsive">Comentarios</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
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

@endsection

@section('endscript')

<script>
    $('#table1').DataTable( {
            select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "/admin/comentarios/search",
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
                           return  '<img src= {{route('cursos.index')}}'+data+' class="img-fluid" />'
                    }},
                    { "data": "Comentario", "name": "Comentario" },
                    { "data": "created_at", "name": "created_at" },
            ],
            @include('layout.lenguagetable')

        } );
</script>
@endsection