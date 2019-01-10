@extends('layout.cms')
@section('title', 'INICIO')
@section('content')

<main>
    <div class=" card white mt-5 mx-5 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Categorias</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th>Descripcion Completa</th>
                            <th>Imagen</th>
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
    $('#example').DataTable( {
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
                           return  '<img src='+data+' class="img-fluid" />'
                    }},
            ],
            @include('layout.lenguagetable')

        } );
</script>
@endsection