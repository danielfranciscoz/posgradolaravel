@extends('layout.cms')
@section('title', 'INICIO')
@section('content')

<main>
    <div class=" card white mt-5 mx-5 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Usuarios</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal(true)"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold" onclick="openmodal(false)"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold" onclick="opendelete()"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
        
            <div class="table-responsive px-4 mt-4 mb-4">
                <table id="table1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Email</th>
                            <th>Tipo Usuario</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Suscrito</th>
                        </tr>
                    </thead>
                   <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</main>

@include('cms.modalUsuarios')
@include('cms.modaldelete')


@endsection

@section('endscript')

<script>

$("#alertmodalusuarios").hide();
$("#alertmodaldelete").hide();   
    var id = 0;
    var email = "";
    var password = "";
    var isadmin = "";
    var issuscrito = "";
    var primern = "";
    var segundoa = "";
    var primera = "";
    var segundon = "";
    var dni = "";
    var telefono = "";
 

    var table =  $('#table1').DataTable( {
        select: true,
            "processing": true,
            "serverSide": true,
            "orderMulti": false,
            "ajax": {
                "url": "{{route('admin.searchusuarios')}}",
                "type": "POST",
                'data': {"_token": $('meta[name="csrf-token"]').attr('content')},        
                "dataType": "JSON"

            },
            "columns": [                    
                    { "data": "id", "name": "id" ,"visible":false},
                    { "data": "email", "name": "email" },      
                    { "data": "isAdmin", "name": "isAdmin",render:function(data){
                        if (data==1) {
                            return 'Administrador'
                        }else{
                            return 'Usuario Web'
                        }
                    }  },      
                    { "data": "PrimerNombre", "name": "PrimerNombre" },                   
                    { "data": "SegundoNombre", "name": "SegundoNombre" },
                    { "data": "PrimerApellido", "name": "PrimerApellido" },
                    { "data": "SegundoApellido", "name": "SegundoApellido" },
                    { "data": "DNI", "name": "DNI" },
                    { "data": "Telefono", "name": "Telefono" },
                    { "data": "isSuscript", "name": "isSuscript",render:function(data){
                        if (data==1) {
                            return 'Suscrito'
                        }else{
                            return 'No suscrito'
                        }
                    } },
            ],
              
            @include('layout.lenguagetable')

        } );
        function openmodal(nuevo){
            this.nuevo = nuevo;
            if(nuevo==true){
                clear();
                $('#modalusuarios').modal('show');
            }else{
                if(id>0){
                    setedit();
                    $('#modalusuarios').modal('show');
                }
            }
        }

        function opendelete(){
            if(id>0){
                $('#modaldelete').modal('show');
            }
        }

        function clear(){
            $('#email').val("");
            $('#password').val("");
            $('#primern').val("");
            $('#segundon').val("");
            $('#primera').val("");
            $('#segundoa').val("");
            $('#dni').val("");
            $('#telefono').val("");
            $('#isadmin').val("");
            $('#issuscrito').val("");                   

        }

        function setedit(){
            $('#email').val(email);
            $('#password').val(password);
            $('#primern').val(primern);
            $('#segundon').val(segundon);
            $('#primera').val(primera);
            $('#segundoa').val(segundoa);
            $('#dni').val(dni);
            $('#telefono').val(telefono);
            $('#isadmin').val(isadmin);
            $('#issuscrito').val(issuscrito);             

        }


        $("#but_upload").click(function(){
            if(nuevo){
                var fd = new FormData();
                var files = $('#file')[0].files[0];          
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('email',$('#email').val());
                fd.append('password',$('#password').val());
                fd.append('isAdmin',$('#isadmin').val());
                fd.append('PrimerNombre',$('#primern').val());
                fd.append('SegundoNombre',$('#segundon').val());
                fd.append('PrimerApellido',$('#primera').val());
                fd.append('SegundoApellido',$('#segundoa').val());
                fd.append('DNI',$('#dni').val());
                fd.append('Telefono',$('#telefono').val());
                fd.append('isSuscript',$('#issuscrito').val());
                
                $.ajax({
                    url: "{{route('registrar')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalusuarios").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalusuarios").show();

                             if (typeof response.responseJSON.errors.email != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.email.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.email[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.password != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.password.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.password[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.isAdmin != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isAdmin.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isAdmin[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.PrimerNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerNombre[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.SegundoNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoNombre[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.PrimerApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.SegundoApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.DNI != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.DNI.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.DNI[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Telefono != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Telefono.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Telefono[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.isSuscript != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isSuscript.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isSuscript[i]+'</b><br></br>';                                  
                              }
                            }

                                    $("#alertmodalusuarios").html(str);
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
                fd.append('email',$('#email').val());
                fd.append('password',$('#password').val());
                fd.append('isAdmin',$('#isadmin').val());
                fd.append('PrimerNombre',$('#primern').val());
                fd.append('SegundoNombre',$('#segundon').val());
                fd.append('PrimerApellido',$('#primera').val());
                fd.append('SegundoApellido',$('#segundoa').val());
                fd.append('DNI',$('#dni').val());
                fd.append('Telefono',$('#telefono').val());
                fd.append('isSuscript',$('#issuscrito').val());
               $.ajax({
                    url: "{{route('admin.usuarios')}}/"+id,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                    console.log(response.message);
                    if(response.message=="exito"){
                        table.ajax.reload();
                    } $("#modalusuarios").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalusuarios").show();
                                          
                                    if (typeof response.responseJSON.errors.email != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.email.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.email[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.password != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.password.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.password[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.isAdmin != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isAdmin.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isAdmin[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.PrimerNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerNombre[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.SegundoNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoNombre[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.PrimerApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.SegundoApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.DNI != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.DNI.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.DNI[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Telefono != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Telefono.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Telefono[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.isSuscript != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isSuscript.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isSuscript[i]+'</b><br></br>';                                  
                              }
                            }
                                    $("#alertmodalusuarios").html(str);
                    }
                });
             
            }
            });

            $("#btn_delete").click(function(){           
              
                $.ajax({
                    url: "{{route('admin.usuarios')}}/"+id,
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
                                          
                                    if (typeof response.responseJSON.errors.email != "undefined") {
                                   
                                    
                                   for(var i=0;i<response.responseJSON.errors.email.length;i++){
                                       
                                       str= str +'<b>'+response.responseJSON.errors.email[i]+'</b><br></br>';                                  
                                   }
                               }
                               
                           
                               if (typeof response.responseJSON.errors.password != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.password.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.password[i]+'</b><br></br>';                                  
                              }
                            }
                          
                            if (typeof response.responseJSON.errors.isAdmin != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isAdmin.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isAdmin[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.PrimerNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerNombre[i]+'</b><br></br>';                                  
                              }
                            }
                               
                            if (typeof response.responseJSON.errors.SegundoNombre != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoNombre.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoNombre[i]+'</b><br></br>';                                  
                              }
                            }

                            if (typeof response.responseJSON.errors.PrimerApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.PrimerApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.PrimerApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.SegundoApellido != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.SegundoApellido.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.SegundoApellido[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.DNI != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.DNI.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.DNI[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.Telefono != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.Telefono.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.Telefono[i]+'</b><br></br>';                                  
                              }
                            }
                            if (typeof response.responseJSON.errors.isSuscript != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.isSuscript.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.isSuscript[i]+'</b><br></br>';                                  
                              }
                            }
                                    
                                    $("#alertmodaldelete").html(str);
                    }
                });
            });

            $('#modalusuarios').on('hidden.bs.modal', function (e) {
                $("#alertmodalusuarios").hide();
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
                 email = table.row(this ).data().email ;
                 password = table.row(this ).data().password ;
                 isadmin = table.row(this ).data().isAdmin ;
                 primern = table.row(this ).data().PrimerNombre ;
                 segundon = table.row(this ).data().SegundoNombre ; 
                 primera = table.row(this ).data().PrimerApellido ;
                 segundoa = table.row(this ).data().SegundoApellido ; 
                 telefono = table.row(this ).data().Telefono ; 
                 dni = table.row(this ).data().DNI ; 
                 issuscrito = table.row(this ).data().isSuscript ;  
            } );


        
</script>
@endsection