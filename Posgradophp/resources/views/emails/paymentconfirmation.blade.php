<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type='text/css'>
    body{
        font-family: sans-serif
    }
    a{
        color:#1565c0;
        font-weight:bold;
       
    }
    </style>
</head>
<body>

<h2><span style="color: #1565c0;">¡Hola <strong>{{$user->estudiante->PrimerNombre .' '. $user->estudiante->PrimerApellido}}</strong>!</span></h2>

<p>Hemos recibido tu pago, a continuación te presentamos el detalle de tu compra:<br /><br />
</p>
<hr>
<p>Gracias por confiar en nosotros.</strong></p>
<br />
<p>Atentamente,<br /><br /><strong>Equipo de Posgrado </strong><br /> <strong>Universidad Nacional de Ingenier&iacute;a</strong></p>


</body>
</html>