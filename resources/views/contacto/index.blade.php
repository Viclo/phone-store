
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Sitio Web de Phonebol</title>
</head>
<body>
    <p>Nuevo Mensaje.</p>
    <p>Estos son los datos del usuario que ha realizado la peticion:</p>
    <ul>
        <li>Nombre: {{ $nombre }}</li>
        <li>Teléfono: {{ $telefono }}</li>
        <li>Mail: {{ $email }}</li>
    </ul>
    <p>Comentario</p>
    <p>{{$mensaje}}</p>
    
    <p>Mensaje Enviado desde la pagina de Phonebol</p>
</body>
