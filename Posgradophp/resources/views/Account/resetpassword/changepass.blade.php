
@extends('layout.app')
@section('title', 'Registro nuevo usuario')
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
                                   Restablecimiesnto de contraseña
                                   {{csrf_field()}}
                                </h4>
                                <p class="mb-4 text-justify">Digite su nueva contraseña</p>
                                <input type="password" id="password" class="form-control mb-2" placeholder="contraseña nueva" required/>
                                
                                <input type="password" id="password2" class="form-control mb-2" placeholder="repetir contraseña" required/>
                                <div class="d-flex justify-content-center">
                                <button
                                    class="g-recaptcha btn btn-primary btn-block w-25 text-center"
                                    data-sitekey="6Lfd-H8UAAAAACqXYzpPOjM_9UpJkBaqnbsvikfq"
                                    data-callback="submite">
                                    Guardar contraseña
                                </button>
                                </div>
                                <div class="alert alert-success col-12 mt-4" role="alert" id="alertreset">
                                    </div>

                                    
                            </div>
                        </div>   

                 </div>
            </div>
        </div>
    </div>
</main>

@endsection