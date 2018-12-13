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

<p>Al parecer has olvidado la contraseña de tu cuenta, pero no te preocupes, vamos a solucionar tu problema.<br><br> Por favor presiona click en el siguiente enlace:<br /><br />
</p>

<a title="Cambio de contraseña" href="localhost:8000/account/password/reset/{{$user->token}}" target="_blank" >Cambio de contraseña</a><br /><br />
<p>Si el enlace anterior no funciona, entonces por favor copia y pega la siguiente dirección en la barra de búsqueda de tu navegador: <strong>localhost:8000/account/password/reset/{{$user->token}}</strong></p>
<br />
<p>Atentamente,<br /><br /><strong>Equipo de Posgrado </strong><br /> <strong>Universidad Nacional de Ingenier&iacute;a</strong></p>
<p><br /><span style="color: #333333;font-size:14px;">&iquest;No creaste una cuenta en nuestro sitio? Es probable que alguien haya escrito tu direcci&oacute;n de correo electr&oacute;nico por accidente. Si&eacute;ntete en la libertad de ignorar este mensaje.</p>

</body>
</html>