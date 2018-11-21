
@section('carrito')

var contentcarrito = ['<p >Tu Carrito de Compras está vacía</p>',
        '<a class="text-center" href="../account/carrito">Ver Carrito</a>',
       , ].join('');

    $("#carrito").popover({ 
        title: 'Carrito de Compras',
       content: contentcarrito,
        trigger: 'click hover focus',
        placement : 'bottom' ,
        html: true
        });

@endsection