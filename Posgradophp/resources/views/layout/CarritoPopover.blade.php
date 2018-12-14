
@section('carrito')
        @if(Session::has('cartItems'))
        var contentcarrito = '<div class="d-flex align-items-center row" id="carritodiv">';
                contentcarrito = [contentcarrito,'<p class="col-12"> Hay {{count(Session::get('cartItems'))}} estudios en tu carrito  </p>', ].join('');
                @php
                                $totalcarrito = 0;
                @endphp
                @for($i=0;$i<count(Session::get('cartItems'));$i++)
                        @php 
                                $totalcarrito = $totalcarrito+ Session::get('cartItems')[$i]['Precio'];
                        @endphp
                @endfor
                contentcarrito = [contentcarrito,'<p class="font-weight-bold col-12"> Total $ {{$totalcarrito}}   </p>', ].join('');
                contentcarrito = [contentcarrito,'<a class="text-center col-12" href="/account/carrito">Ver Carrito</a></div>', ].join('');
                $("#carrito").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarrito,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });

       @else
        
       var contentcarrito = '<div class="" id="carritodiv">';
                contentcarrito = contentcarrito + ['<p >Tu Carrito de Compras está vacía</p>',
                        <!-- '<a class="text-center" href="../account/carrito">Ver Carrito</a></div>', -->
                , ].join('');

                $("#carrito").popover({ 
                        title: 'Carrito de Compras',
                content: contentcarrito,
                        trigger: 'click hover focus',
                        placement : 'bottom' ,
                        html: true
                        });
        @endif
@endsection