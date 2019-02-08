@extends('layout.cms')
@section('title', 'INICIO')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<main>
    <div class=" card white mt-5 mx-5 mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold h4-responsive">Usuarios</h4>
            {{csrf_field()}}
            <a class="btn btn-sm green darken-4 white-text font-weight-bold" onclick="openmodal(true)"> <i class="fa fa-save" aria-hidden="true"></i>&nbsp; Nuevo Administrador</a>
            <a class="btn btn-sm yellow darken-4 white-text font-weight-bold" onclick="openmodal(false)"><i class="fa fa-edit" aria-hidden="true">&nbsp; </i>Editar</a>
            <a class="btn btn-sm red darken-4 white-text font-weight-bold" onclick="opendelete()"><i class="fa fa-trash" aria-hidden="true"> </i>&nbsp;Eliminar</a>
            <a class="btn btn-sm orange darken-4 white-text font-weight-bold" onclick="opencontra()"><i class="fa fa-edit" aria-hidden="true"> </i>&nbsp;Cambiar Contraseña</a>
        
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

<div class="modal fade" id="modalcontra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <form id="loginForm" method="post" >
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold">Cambio de contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class=" ml-5 mr-5">            
                   
                        <i class="fa fa-cog prefix grey-text"></i>
                        <label>Contraseña</label>
                        <input type="password" id="passrecovery" class="form-control" >

            </div>
              
                <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-12 ">
                        
                        <div class="d-flex justify-content-center align-items-center text-justify row container ml-1">
                            <div class="alert alert-danger col-12" role="alert" id="alertrecovery">
                            
                            </div>
                          <!--   <a class="" id="">Guardar</a -->

                            
                      <button
                                    class="btn btn-sm btn-primary col-6 mt-5 "
                                   
                                   onclick="but_pass()">
                                    Guardar Contraseña                       
                                    </button>

                        </div>
                        
                         
                           
                           </div>
                        <!--Grid column-->

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>



@include('cms.modalUsuarios')
@include('cms.modaldelete')


@endsection
@section('endscript')
<script>

$("#alertmodalusuarios").hide();
$("#alertmodaldelete").hide();  
$("#alertrecovery").hide();  
$("#tipodiv").hide();    
$("#contradiv").show();   
    var id = 0;
    var email = "";
    var password = "";
    var isadmin = "";
    var issuscrito = 0;
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
                $("#contradiv").show(); 
                $("#tipodiv").hide();          
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

        function opencontra(){
            if(id>0){
                $('#modalcontra').modal('show');
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
            $('#issuscrito').val(0); 
            $('#email').prop('disabled', false);                  

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
            $("#tipodiv").show();
            $('#email').prop('disabled', true);
          
            $("#contradiv").hide(); 
        }

        
        function but_upload(t){
            
            if(nuevo){
                var fd = new FormData();
                       
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('email',$('#email').val());
                fd.append('password',$('#password').val());
                fd.append('isAdmin', 1);
                fd.append('PrimerNombre',$('#primern').val());
                fd.append('SegundoNombre',$('#segundon').val());
                fd.append('PrimerApellido',$('#primera').val());
                fd.append('SegundoApellido',$('#segundoa').val());
                fd.append('DNI',$('#dni').val());
                fd.append('Telefono',$('#telefono').val());
                fd.append("g-recaptcha-response",t);               
                fd.append('isSuscript',$('#issuscrito').val());
                
                $.ajax({
                    url: "{{route('registrar')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                   
                 
                    table.ajax.reload();
                    $("#modalusuarios").modal('hide');
                    
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
                
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('id',id);
                fd.append('_method','put');                
                fd.append('email',$('#email').val());
                fd.append('PrimerNombre',$('#primern').val());
                fd.append('SegundoNombre',$('#segundon').val());
                fd.append('PrimerApellido',$('#primera').val());
                fd.append('SegundoApellido',$('#segundoa').val());
                fd.append('DNI',$('#dni').val());
                fd.append('Telefono',$('#telefono').val());
                fd.append('isSuscript',$('#issuscrito').val());
               $.ajax({
                    url: "{{route('admin.usuariosSave')}}/"+id,
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
            grecaptcha.reset();
            };

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

            function but_pass(){
            
         
                var fd = new FormData();
                       
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('id',id);            
                fd.append('password',$('#passrecovery').val());               
                $.ajax({
                    url: "{{route('admin.adminReset')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){                   
                 
                    table.ajax.reload();
                    $("#modalcontra").modal('hide');
                    
                    },
                    error: function(response){
                    
                        var str = "";
                                    $("#alertmodalcontra").show();

                           
                           
                               if (typeof response.responseJSON.errors.password != "undefined") {
                              
                               
                              for(var i=0;i<response.responseJSON.errors.password.length;i++){
                                  
                                  str= str +'<b>'+response.responseJSON.errors.password[i]+'</b><br></br>';                                  
                              }
                            }                         
                          

                                    $("#alertmodalcontra").html(str);
                    }
                });
            }


            $('#modalusuarios').on('hidden.bs.modal', function (e) {
                $("#alertmodalusuarios").hide();
                $("#tipodiv").show();
                $("#contradiv").hide(); 
            }) 
            
         
            $('#table1 tbody').on( 'click', 'tr', function () {
                 id = table.row(this ).data().id ;
                 email = table.row(this ).data().email ;                
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