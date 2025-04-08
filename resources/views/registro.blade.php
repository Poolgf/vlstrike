<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            flex-direction: column;
        }

        .cajaLogin {
            background: white;
            width: 25%;
            height: auto;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-bottom: 10%;
        }

        h3 {
            font-family: 'Spiegel', serif;
            font-size: 35px;
        }

        .cajaLogin h2 {
            font-size: 40px;
        }

        .posicion {
            margin-top: 0;
        }

        .posicion h3 {
            margin-left: 0;
        }

        input {
            width: 90%;
            padding: 15px;
            margin: 10px 0;
            background: #ececec;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #ff4655;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            width: 95%;
            border-radius: 5px;
            transition: 0.3s;
        }

        .enviar {
            width: 90%;
        }

        button:hover {
            background-color: #ca3d4c;
            transform: scale(1.05);
        }

        .noTienesCuenta,
        .crearCuenta {
            margin-top: 10px;
            display: block;
        }

        .crearCuenta {
            text-decoration: none;
            color: #ff4655;
            font-weight: bold;
        }

        .titulo {
            margin-top: 5%;
            font-size: 50px;
            color: white;
            font-family: 'FF Mark W05', sans-serif;
            text-align: center;
        }


        @media (max-width: 992px) {
            .cajaLogin {
                width: 60%;
            }

            .titulo {
                font-size: 40px;
            }
        }

        @media (max-width: 600px) {
            .cajaLogin {
                width: 90%;
                padding: 20px;
            }

            .titulo {
                font-size: 30px;
            }

            input {
                width: 100%;
            }

            .enviar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="titulo">
    <h1>CREA TU CUENTA</h1>
</div>

<div class="cajaLogin">
    <div class="posicion">
        <form method="POST">
            @csrf
            <input type="text" name="nombreUsuario" placeholder="Nombre de usuario del LOL" required />
            <input type="text" name="#LOL" placeholder="#LOL" required />
            <input type="text" name="gmail" placeholder="Gmail" required />
            <input type="password" name="contrasena" placeholder="Contraseña" required />
            <input type="password" name="confirmarContrasena" placeholder="Confirmar Contraseña" required />
            <br /><br />
            <button type="submit" class="enviar">Enviar</button>
        </form>
        <br />
        <h4 class="noTienesCuenta">¿Tienes Cuenta?</h4>
        <a href="login" class="crearCuenta">Iniciar Sesión</a>
    </div>
</div>
</body>
</html>
