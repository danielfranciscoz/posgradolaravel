
@extends('layout.app')
@section('title', 'Restablecimiento de contraseña')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12" >
                    
                 <div id="registernow" class="white">
                    <div class="card mb-4 ">
                            <div class="card-body  mb-2 mt-2 mx-4 ">
                                <h4 class="h4-responsive font-weight-bold mt-2 text-justify mb-4">
                                Restablecimiento  de contraseña
                                   {{csrf_field()}}
                                </h4>
                                @if($error==null)
                                <p class="mb-4 text-justify">Digite su nueva contraseña</p>
                                <input type="password" id="password" class="form-control mb-2" placeholder="Contraseña nueva" required/>
                                
                                <input type="password" id="password2" class="form-control mb-2" placeholder="Repetir contraseña" required/>
                                <div class="d-flex justify-content-center">
                                <button
                                    class="g-recaptcha btn btn-sm btn-primary btn-block w-25 text-center"
                                    data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq"
                                    data-callback="submite">
                                    Guardar
                                </button>
                                </div>
                                <div class="alert alert-success col-12 mt-4" role="alert" id="alertreset">
                                
                                </div>
                            @else
                            <p class="mb-4 text-justify">{{$error}}</p>
                            @endif
                                    
                            </div>
                        </div>   

                 </div>
            </div>
        </div>
    </div>
</main>

@endsection


@section('endscript')
<script>
  $("#alertreset").hide();

  function submite(e){
      if( $("#password").val() === $("#password2").val()){
            $("#alertreset").hide();
            var str = "";
            $.ajax( {
            
                    data: {                    
                        "password": $("#password").val(),
                        "g-recaptcha-response": e,
                        "token": "{{$token}}",
                        '_token': $('meta[name="csrf-token"]').attr('content')                                     
                    },
                    url: "{{route('changepass')}}",
                    type: 'POST',
                    success: function(response){
                        str = response.message;
                        $("#alertreset").show();                    
                            $("#alertreset").html(str);
                        },
                    error: function(response){
                        str = response.error;
                        $("#alertreset").show();
                                        
                            $("#alertreset").html(str);
                    }
                    
                
                }
            );
      }else{
          str = "La contraseña deben ser iguales";
        $("#alertreset").show();  
        $("#alertreset").html(str);
      }
  }
        grecaptcha.reset();


</script>
@endsection