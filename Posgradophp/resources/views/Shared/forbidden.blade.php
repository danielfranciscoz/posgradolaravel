
@extends('layout.app')
@section('title', 'Inicio')
@section('content')

    <div class="text-center">
        <img src="{{route('cursos.index')}}/svg/403.svg" style="width:40%"  />
        <br/>
        <a class="btn btn-danger btn-sm" onclick='window.location.href = "{{route('cursos.index')}}"'>Ir a inicio</a>
   
    </div>
    
   <!--  <div class="col-6 ">
        <div class="col-6 ">
            <h5>Lo sentimos su dirección de url no </h5>
        </div>       
    </div> -->

@endsection