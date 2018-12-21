@extends('layout.cms')
@section('title', 'INICIO')
@section('content')

<main>
    <div class=" card white mt-5 mx-5 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Categorias</h4>
            <a class="btn btn-sm green darken-4 white-text font-weight-bold"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</main>

@endsection

@section('endscript')

<script>
    $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/admin/categorias/search"
        } );
</script>
@endsection