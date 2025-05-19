<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Riot Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Autenticacion/registro.css') }}">
</head>
<body>
<div class="titulo">
    <h1>CREA TU CUENTA</h1>
</div>

<div class="cajaLogin">
    <div class="posicion">
        <form method="POST" action="{{ route('comprobarUsuario') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de usuario del LOL" required />
            <input type="text" name="tag" placeholder="#LOL" required />
            <input type="text" name="correo" placeholder="Gmail" required />
            <input type="password" name="contrasena" placeholder="Contraseña" required />
            <input type="password" name="contrasena_confirmation" placeholder="Confirmar Contraseña" required />
            <br /><br />
            <button type="submit" class="enviar">Enviar</button>
        </form>
        <br />
        <h4 class="noTienesCuenta">¿Tienes Cuenta?</h4>
        <a href="login" class="crearCuenta">Iniciar Sesión</a>
    </div>
</div>

@if(session('alert'))
    <script>
        alert(@json(session('alert')));
    </script>
@endif

</body>
</html>
