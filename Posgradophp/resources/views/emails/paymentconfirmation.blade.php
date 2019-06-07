<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type='text/css'>
    body {
        font-family: sans-serif
    }

    a {
        color: #1565c0;
        font-weight: bold;

    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #E3F2FD;
    }
    </style>
</head>

<body>

    <h2><span style="color: #1565c0;">¡Hola
            <strong>{{$user->estudiante->PrimerNombre .' '. $user->estudiante->PrimerApellido}}</strong>!</span></h2>

    <p>Hemos recibido tu pago, a continuación te presentamos el detalle de tu compra:<br />
    </p>
    <hr>
    <table style="width:50%">
        <tr>
            <th>Curso</th>
            <th>Horas clase</th>
            <th>Inversión</th>
        </tr>

        @foreach ($precio as $curso)
        <tr>
            <td>
                {{$curso->curso->NombreCurso}}
            </td>
            <td>
                {{$curso->curso->horas_clase}}
            </td>
            <td>
                $ {{$curso->Precio}}
            </td>
        </tr>
        @endforeach
        <tr>
        <td></td>
        <th >Total</td>
        <th >$ {{$precio->sum('Precio')}}</td>
        </tr>
    </table>
    <hr>
    <br>
    <br>
    <p>Gracias por confiar en nosotros, si tienes alguna duda, puedes contactarnos a <a href="mailto:info@posgrado.uni.edu.ni">info@posgrado.uni.edu.ni</a></p>
    
    <p>Atentamente,<br /><br /><strong>Equipo de Posgrado </strong><br /> <strong>Universidad Nacional de
            Ingenier&iacute;a</strong></p>


</body>

</html>