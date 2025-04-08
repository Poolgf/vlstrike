<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranks - Valorant</title>
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

            transform: scale(1.15);
        }

        .radiant {
            grid-column: span 2;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .radiant {
                grid-column: span 1;
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
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Iron.png') }}" alt="Iron"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Bronze.png') }}" alt="Bronze"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Silver.png') }}" alt="Silver"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Gold.png') }}" alt="Gold"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Platinum.png') }}" alt="Platinum"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Ascendant.png') }}" alt="Ascendant"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Diamond.png') }}" alt="Diamond"></div>
    <div class="rangosFondo"><img src="{{ asset('Img/Valorant/Rangos/Immortal.png') }}" alt="Immortal"></div>

    <!-- Radiant centrado abajo -->
    <div class="rangosFondo radiant">
        <img src="{{ asset('Img/Valorant/Rangos/Radiant.png') }}" alt="Radiant">
    </div>
</div>

<div class="footer">
    &copy; 2024 Riot Games - Valorant. Todos los derechos reservados.
</div>

</body>
</html>
