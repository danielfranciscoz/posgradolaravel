@extends('layout.app')
@section('title', 'Registro nuevo usuario')
@section('content')
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12" >
                        </br>
                 <div id="registernow" class="white">
                    <div class="card mb-4 ">
                            <div class="card-body row mb-2 mt-2 mx-4">
                                <h4 class="h4-responsive font-weight-bold mt-2 text-justify">
                                    Bienvenido {{$user->email}}!
                                </h4>
                                <p class="text-justify mt-2">
                                    {{$message}}
                                    </p>
                                    
                            </div>
                        </div>   

                 </div>
            </div>
        </div>
    </div>
</main>

@endsection