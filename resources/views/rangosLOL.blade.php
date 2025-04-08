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
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .rangosFondo:hover {
            background-color: #2a2a2a;
            transform: scale(1.05);
        }

        .rangosFondo img {
            width: 100%;
            transition: 0.8s;
            max-width: 200px;
        }

        .rangosFondo img:hover {

            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #000;
            font-size: 12px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<x-header/>

<div class="container">
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Iron.png') }}" alt="Iron"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Bronze.png') }}" alt="Bronze"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Silver.png') }}" alt="Silver"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Gold.png') }}" alt="Gold"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Platinum.png') }}" alt="Platinum"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Esmerald.png') }}" alt="Esmeralda"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Diamond.png') }}" alt="Diamond"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Master.png') }}" alt="Master"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Grandmaster.png') }}" alt="Grandmaster"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/LOL/Rangos/Challenger.png') }}" alt="Challenger"></div>
</div>

<div class="footer">
    &copy; 2024 Riot Games - League of Legends. Todos los derechos reservados.
</div>

</body>
</html>
