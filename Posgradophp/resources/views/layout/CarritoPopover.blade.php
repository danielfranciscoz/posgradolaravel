
@section('carrito')
        @if(Session::has('cartItems'))
        var contentcarritosm = '<div class="d-flex align-items-center row" id="carritodivsm">';
                contentcarritosm = [contentcarritosm,'<p class="col-12"> Hay {{count(Session::get('cartItems'))}} estudios en tu carrito  </p>', ].join('');
                @php
                                $totalcarrito = 0;
                @endphp
                @for($i=0;$i<count(Session::get('cartItems'));$i++)
                        @php 
                                $totalcarrito = $totalcarrito+ Session::get('cartItems')[$i]['Precio'];
                        @endphp
                @endfor
                contentcarritosm = [contentcarritosm,'<p class="font-weight-bold col-12"> Total $ {{number_format($totalcarrito, 2)  }}   </p>', ].join('');
                contentcarritosm = [contentcarritosm,'<a class="text-center col-12" href="{{route('carrito')}}">Ver Carrito</a></div>', ].join('');
                
                var contentcarritomd = '<div class="d-flex align-items-center row" id="carritodivmd">';
                contentcarritomd = [contentcarritomd,'<p class="col-12"> Hay {{count(Session::get('cartItems'))}} estudios en tu carrito  </p>', ].join('');
                @php
                                $totalcarrito = 0;
                @endphp
                @for($i=0;$i<count(Session::get('cartItems'));$i++)
                        @php 
                                $totalcarrito = $totalcarrito+ Session::get('cartItems')[$i]['Precio'];
                        @endphp
                @endfor
                contentcarritomd = [contentcarritomd,'<p class="font-weight-bold col-12"> Total $ {{number_format($totalcarrito, 2) }}   </p>', ].join('');
                contentcarritomd = [contentcarritomd,'<a class="text-center col-12" href="{{route('carrito')}}">Ver Carrito</a></div>', ].join('');
                
                
                $("#carritomd").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarritomd,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });
                        $("#carritosm").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarritosm,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });

       @else
        
       var contentcarritosm = '<div class="" id="carritodivsm">';
       contentcarritosm = contentcarritosm + ['<p >Tu Carrito de Compras está vacía</p>',
                        <!-- '<a class="text-center" href="../account/carrito">Ver Carrito</a></div>', -->
                , ].join('');

                var contentcarritomd = '<div class="" id="carritodivmd">';
                contentcarritomd = contentcarritomd + ['<p >Tu Carrito de Compras está vacía</p>',
                        <!-- '<a class="text-center" href="../account/carrito">Ver Carrito</a></div>', -->
                , ].join('');

                $("#carritosm").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarritosm,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });


                $("#carritomd").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarritomd,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });
        @endif

        $( "#carritomd" ).mouseover(function() {
                $( "#carritomd" ).click();
        });
        $( "#carritosm" ).mouseover(function() {
                $( "#carritosm" ).click();
        });
@endsection

@php
if(isset( $totalcarrito)){
         $GLOBALS["totalcarrito"] = $totalcarrito ;
      }
@endphp