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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255);
            padding: 150px 60px;
            text-align: center;
        }

        h3 {

            font-family: 'Spiegel', serif;
            font-size: 35px;

        }

        .cajaLogin h2{

            font-size: 40px;

        }

        input {
            width: 100%;
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

        .posicion{

            margin-top: -30%;
            margin-left: -6%;

        }

        .posicion h3{

            margin-left: 5%;

        }

        .enviar{

            width: 110%;

        }

        .noTienesCuenta, .crearCuenta {

            margin-left: 5%;

        }

        .crearCuenta{

            text-decoration: none;

        }


    </style>
</head>
<body>
    <div class="background">
    </div>
    <div class="cajaLogin">
        <div class="posicion">
        <h3>Iniciar sesión</h3>
        <form method="POST">
            @csrf
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <br>
            <br>
            <button type="submit" class="enviar">Enviar</button>
        </form>
            <br>
            <h4 class="noTienesCuenta">¿No tienes cuenta?</h4>
        <a href="registro" class="crearCuenta">Crear cuenta</a>
    </div>
    </div>
</body>
</html>
