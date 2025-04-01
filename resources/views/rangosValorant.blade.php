<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranks - League of Legends</title>
    <style>

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
        }

        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            z-index: 1000;
            transition: 0.8s;
        }

        .navbar div a:hover{
            transform: scale(1.05);
            color: #dfdfdf;
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
            color: red;
        }

        .navbar .menu {
            display: flex;
            gap: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        .navbar .login {
            background-color: #0094FF;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-right: 3%;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 100px 20px 40px;
            max-width: 900px;
            margin: auto;
        }

        .rangosFondo {
            background-color: #1E1E1E;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rangosFondo img {
            width: 100%;
            max-width: 200px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #000;
            font-size: 12px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">RedBull</div>
    <div class="menu">
        <a href="#">INICIO</a>
        <a href="#">EVENTOS Y CLASIFICACIÓN</a>
        <a href="#">OTRAS LIGAS</a>
        <a href="#">POWER RANKINGS</a>
        <a href="#">QUINIELA DEL MUNDIAL</a>
        <a href="#">RECOMPENSAS</a>
        <a href="#">MÁS ▼</a>
    </div>
    <a href="#" class="login">INICIA SESIÓN</a>
</div>

<div class="container">
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Iron.png') }}" alt="Iron"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Bronze.png') }}" alt="Bronze"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Silver.png') }}" alt="Silver"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Gold.png') }}" alt="Gold"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Platinum.png') }}" alt="Platinum"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Ascendant.png') }}" alt="Ascendant"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Diamond.png') }}" alt="Diamond"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Immortal.png') }}" alt="Immortal"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Radiant.png') }}" alt="Radiant"></div>
</div>

<div class="footer">
    &copy; 2024 Riot Games - League of Legends. Todos los derechos reservados.
</div>

</body>
</html>
