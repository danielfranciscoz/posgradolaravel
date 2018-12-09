@extends('layout.app')
@section('title', 'Carrito de Compras')
@section('content')
 

<main class=" mx-4">
@if(Session::has('cartItems'))

    <div class="container ">
    <h3 class="h3-responsive mt-4 font-weight-bold  ">Estudios agregados al carrito</h3>
        <div class="row">
            <div class="col-md-8 col-sm-12">
            @php $totalcarrito=0 @endphp
            @for($i=0;$i<count(Session::get('cartItems'));$i++)
            @php $totalcarrito=$totalcarrito + Session::get('cartItems')[$i]['Precio']; @endphp
            <div class="card white mb-4 mt-2">
                     <div class="card-body row">
                                <div class="col-4 " >
                                    <img src={{Session::get('cartItems')[$i]['Image_URL']}} class="w-100"/>
                                </div>
                                <div class="col-8">
                                    <p style="margin-bottom:0"> <p class="h4-responsive font-weight-bold"  onclick='curso("{{Session::get('cartItems')[$i]['curso']}}");' style="cursor: pointer; margin-bottom:0;"> {{Session::get('cartItems')[$i]['curso'] }}</p>
                                    <p class="h6-responsive" style="color:#616161; margin-bottom:0"><i class="fa fa-clock-o" aria-hidden="true"></i> {{Session::get('cartItems')[$i]['horas']}} Horas Clase &nbsp<i class="fa fa-certificate grey-text" aria-hidden="true">  </i>
                                Certificación &nbsp <i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                                Recursos Descargables</p>
                                    </p>
                                    
                                    <h5 class="font-weight-bold float-left "  style="color:#b71c1c "> 
                                        $ {{Session::get('cartItems')[$i]['Precio'] }}
                                   </h5> 
                                    <p class="btn btn-sm red darken-4 float-right" onclick='delcart({{Session::get("cartItems")[$i]["id"]}})' > Eliminar</p> 
                                    
                                

                                </div>

                            </div>
                     </div>
            
         @endfor
            </div>
            <div class="card col-md-4 col-sm-12 white mb-4 mt-2 " style="height:300px">
                <h5 class="h5-responsive mt-3 text-center  font-weight-bold ">Subtotal ({{count(Session::get('cartItems'))}} Estudios): <a  style="color:#b71c1c ">$ {{$totalcarrito}}</a></h5>
                @guest
                <a class="btn btn-primary mt-4 w-95 mb-2 disabled"> Proceder al Pago</a>
                <a class="text-center">Debe Iniciar Sesíon para proceder al pago</a>
                <a class="btn text-white " data-toggle="modal" data-target="#modalLoginForm" style="background: #424242;"> Iniciar Sesíon</a>
                
               
                
               @else
               
               <a class="btn btn-primary mt-4 w-95 mb-2" href="../account/pagarcarrito">Proceder al Pago</a>
              
                @endguest
                <div class="mt-2 d-flex justify-content-center grey-text">
                                <i class="fa fa-cc-visa fa-3x mx-1" aria-hidden="true"></i>
                                <i class="fa fa-cc-amex fa-3x mx-1" aria-hidden="true"></i>
                                <i class="fa fa-cc-mastercard fa-3x mx-1" aria-hidden="true"></i>
                </div>
                           
            </div>

        </div>
    </div>

    
    <h5 class="h5-responsive mt-4 text-center mb-5 font-weight-bold ">Subtotal ({{count(Session::get('cartItems'))}} Estudios): <a style="color:#b71c1c ">$ {{$totalcarrito}}</a></h5>
    @else
  
    <div class="container" >
    <h3 class="h3-responsive mt-4 mb-4 font-weight-bold">Estudios agregados al carrito</h3>
        <div class="card  d-flex align-items-center justify-content-center white mb-5 mt-2 text-center font-weight-bold" style="height:300px">
           Tu carrito de compras esta vacio.
        </div>
    </div>

    @endif
</main>

@endsection



<script>
    function delcart(id){
        $.ajax({
            url: "../process/delcarrito",
            type : 'GET',
            data: {
                "curso" : id
            },
            success: function(data) {  
                if (data.message == "error") {
                    $( "#textaddcarrito" ).html( "<p>"+data.error+"</p>" );
                    $('#frameModalBottom').modal('show');
                }else{
                   
                    setTimeout(function(){ location.reload(); }, 00);
                }
            }
        });

    }
    function curso(page)
    {
        window.location.href = "/curso/"+page;
    }
    
</script>