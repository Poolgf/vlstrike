<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LEC Partidos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding-top: 80px;
        }

        .navbar div a:hover {
            transform: scale(1.05);
            color: #dfdfdf;
        }

        .horario {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .partido {
            background: #1e1e1e;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .botonPlay {
            background: none;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .botonPlay img {
            width: 32px;
        }

        .equipos {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 0;
        }

        .equipo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .equipo img {
            width: 30px;
            height: 30px;
        }

        .fondoVersus {
            background: #2a2a2a;
            border: none;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
        }

        .fondoVersus img {
            width: 20px;
        }

        .detalles {
            width: 100%;
            background: #161616;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
            color: #aaa;
        }

        .detalles img {
            width: 20px;
        }

        .contadorPartido {
            font-weight: bold;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
                padding: 10px 20px;
            }

            .navbar .menu {
                flex-direction: column;
                gap: 10px;
                margin-top: 10px;
            }

            .navbar .login {
                margin: 10px 0 0 0;
            }

            .equipos {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .detalles {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }

            .horario {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<x-header/>

<div class="horario">
    <h2>lunes 3 feb</h2>

    <div class="partido">
        <button class="botonPlay">
            <img src="{{ asset('Img/LOL/Rangos/bronze.png') }}" alt="Play" />
        </button>

        <div class="equipos">
            <div class="equipo">
                <span>VIT</span>
                <img src="{{ asset('Img/LOL/Rangos/bronze.png') }}" alt="VIT Logo" />
            </div>

            <button class="fondoVersus">
                <img src="{{ asset('Img/LOL/Rangos/bronze.png') }}" alt="VS" />
            </button>

            <div class="equipo">
                <img src="{{ asset('Img/LOL/Rangos/bronze.png') }}" alt="GX Logo" />
                <span>GX</span>
            </div>
        </div>

        <div class="detalles">
            <img src="{{ asset('Img/LOL/Rangos/bronze.png') }}" alt="LEC Logo" />
            <span>LEC • Semana 3</span>
            <span class="contadorPartido">MEJOR DE 1</span>
        </div>
    </div>
</div>
</body>
</html>
