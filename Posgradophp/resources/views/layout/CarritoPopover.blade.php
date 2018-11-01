
@section('carrito')

var contentcarrito = ['<p >Tu Carrito de Compras está vacía</p>',
        '<a href="">Seguir Comprando</a>',
       , ].join('');

    $("#carrito").popover({ 
        title: 'Carrito de Compras',
       content: contentcarrito,
        trigger: 'click hover focus',
        placement : 'bottom' ,
        html: true
        });

@endsection