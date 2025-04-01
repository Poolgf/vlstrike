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
            background: url('{{ asset('Img/login.jpg') }}') center/cover no-repeat;
        }

        .cajaLogin {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255);
            padding: 200px 150px;
            border-radius: 10px;
            text-align: center;
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

        .redesSociales{
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .redesSocialesbutton {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 18px;
        }

        .posicion{

            margin-top: -40%;

        }


    </style>
</head>
<body>
    <div class="background">
    </div>
    <div class="cajaLogin">
        <div class="posicion">
        <h2>Iniciar sesión</h2>
        <form method="POST">
            @csrf
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit"></button>
        </form>
        <div class="social-login">
            <button class="google">G</button>
            <button class="facebook">f</button>
            <button class="xbox">X</button>
            <button class="playstation">P</button>
        </div>
        <a href="#">¿No puedes iniciar sesión?</a>
        <a href="#">Crear cuenta</a>
    </div>
    </div>
</body>
</html>
