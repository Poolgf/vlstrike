<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Riot Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/Autenticacion/login.css') }}">
</head>
<body>
<div class="cajaLogin">
    <h3>Iniciar sesión</h3>
    <div class="form-container">
        <form method="POST" action="{{ route('loguearUsuario') }}">
            @csrf
            <input type="text" name="correo" placeholder="Introduce tu correo" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <h4 class="noTienesCuenta">¿No tienes cuenta?</h4>
    <a href="registro" class="crearCuenta">Crear cuenta</a>
</div>
</body>
</html>
