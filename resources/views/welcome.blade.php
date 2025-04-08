<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esports UI</title>
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

        .imagenFondo {
            position: relative;
            height: 100%;
            background: url('{{ asset('Img/ImagenPrincipal.jpg') }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .imagenFondo-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .imagenFondoContenido {
            position: relative;
            max-width: 80%;
            z-index: 1;
        }

        .imagenFondo h1 {
            font-size: 45px;
            font-weight: bold;
            line-height: 1.2;
        }

        .categorias {
            position: absolute;
            top: 20px;
            left: 30px;
            background: transparent;
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            display: flex;
            align-items: center;
        }

        .categorias::before {
            content: "●";
            color: red;
            margin-right: 5px;
        }

        .section {
            background-color: #222;
            width: 50%;
            margin: 0 auto  ;
            padding: 20px;
            margin-top: 2%;
            border-radius: 10px;
            text-align: center;
        }

        .grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .card {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            width: 45%;
        }

        .card img {
            width: 95%;
            margin-top: 2%;
            border-radius: 10px;
        }

        .card h3{

            margin-top: 2%;
            font-size: 30px;

        }

        img{

            transition: 1s;

        }

        img:hover{

           transform: scale(1.05);

        }

        .footer {
            background-color: #000;
            padding: 10px;
            margin-top: 20px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .imagenFondo h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

<x-header/>

<div class="imagenFondo">
    <div class="imagenFondo-overlay"></div>
    <div class="categorias">ESPORTS</div>
    <div class="imagenFondoContenido">
        <h1>Campeones del Mundo<br> LoL 2011-2024: Todos los<br> ganadores y equipos</h1>
    </div>
</div>

<div class="section">¿Sobre qué juego quieres ver o informarte del partido?</div>

<div class="grid">
    <div class="card">
        <a href="enfrentamientos"><img src="{{ asset('Img/valorantChampions.jpg') }}" alt="Valorant"></a>
        <h3>Valorant</h3>
    </div>
    <div class="card">
        <a href="enfrentamientos"><img src="{{ asset('Img/LOLEASPORTS.jpg') }}" alt="League of Legends"></a>
        <h3>League of Legends</h3>
    </div>
</div>

<div class="section">Crea tu propio equipo con gente</div>

<div class="grid">
    <img src="{{ asset('Img/CreaTuPropioEquipoLol.jpg') }}" alt="Equipo" style="width: 40%; border-radius: 15px; border: 3px solid #333">
</div>

<div class="footer">&copy; 2024 Esports. Todos los derechos reservados.</div>
</body>
</html>
