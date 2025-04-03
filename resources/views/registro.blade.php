<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Riot Games</title>
    <style>

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Beaufort', sans-serif;
            background: url('{{ asset('Img/login.jpg') }}') center/cover no-repeat;
        }

        .cajaLogin {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -30%);
            background: rgba(255, 255, 255);
            width: 25%;
            height: 60%;
            text-align: center;
        }

        h3 {

            font-family: 'Spiegel', serif;
            font-size: 35px;

        }

        .cajaLogin h2{

            font-size: 40px;

        }

        .posicion{

            margin-top: 10%;
            margin-left: -6%;

        }

        .posicion h3{

            margin-left: 5%;

        }

        input {
            width: 50%;
            padding: 20px;
            margin: 10px 0;
            background: #ececec;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #ff4655;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        .enviar{

            width: 58%;

        }

        .noTienesCuenta, .crearCuenta {

            margin-left: 1%;

        }

        .crearCuenta{

            text-decoration: none;

        }

        .titulo{

            margin-top: -36%;
            font-size: 50px;
            color: white;
            font-family: 'FF Mark W05', sans-serif;
        }



    </style>
</head>
<body>
<div class="background">
</div>
<div class="titulo">
<h1>CREAR CUENTA</h1>
</div>

<div class="cajaLogin">
    <div class="posicion">
        <form method="POST">
            @csrf
            <input type="text" name="nombreUsuario" placeholder="Nombre de usuario del LOL" required>
            <input type="text" name="#LOL" placeholder="#LOL" required>
            <input type="text" name="gmail" placeholder="Gmail" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="password" name="confirmarContrasena" placeholder="Confirmar Contrasena" required>
            <br>
            <br>
            <button type="submit" class="enviar">Enviar</button>
        </form>
        <br>
        <h4 class="noTienesCuenta">¿Tienes Cuenta?</h4>
        <a href="login" class="crearCuenta">Iniciar Sesión</a>
    </div>
</div>
</body>
</html>
