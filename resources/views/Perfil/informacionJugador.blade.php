<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Invocador - League of Legends</title>
    <link rel="stylesheet" href="{{ asset('css/Perfil/perfilJugador.css') }}">
    <script src="{{ asset('js/Perfil/perfilJugador.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<a href="{{ route('home') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>
<div class="contenedor-perfil">
    <div class="encabezado-perfil">
        <div class="icono-perfil">
            <img src="{{ $profileIconUrl }}" alt="Icono de invocador">
        </div>
        <h1>{{ $gameName }}</h1>
        <p>Invocador nivel {{ $summonerLevel }}</p>
    </div>

    <div class="contenido-perfil">
        <div class="seccion-perfil">
            <h2 class="titulo-seccion">Información del Invocador</h2>

            <div class="dato-jugador">
                <div class="etiqueta-dato">Nombre de Juego:</div>
                <div class="valor-dato resaltado">{{ $gameName }}</div>
            </div>

            <div class="dato-jugador">
                <div class="etiqueta-dato">Tag Line:</div>
                <div class="valor-dato">#{{ $tagLine }}</div>
            </div>

            <div class="dato-jugador">
                <div class="etiqueta-dato">Nivel de Invocador:</div>
                <div class="valor-dato">{{ $summonerLevel }}</div>
            </div>

            <div class="dato-jugador">
                <div class="etiqueta-dato">Última conexión:</div>
                <div class="valor-dato">Hace {{ $lastConnection }} horas</div>
            </div>
        </div>

        <div class="seccion-perfil seccion-rango">
            <h2 class="titulo-seccion">Ligas Clasificatorias</h2>

            <div class="rango-container">
                <div class="rango-emblem">
                    <img src="{{ asset('Img/LOL/Rangos/Gold.png') }}" alt="{{ $soloRankEmblem }}">
                    <img src="{{ asset('Img/LOL/Rangos/sinRango.png') }}" alt="{{ $soloRankEmblem }}">
                </div>
                <div class="rango-info">
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">Cola en Solitario/Dúo:</div>
                        <div class="valor-dato resaltado">{{ $soloRank }} {{ $soloTier }}</div>
                    </div>
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">LP:</div>
                        <div class="valor-dato tooltip">
                            {{ $soloLP }}
                            <span class="tooltip-text">Puntos de Liga</span>
                        </div>
                    </div>
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">Victorias/Derrotas:</div>
                        <div class="valor-dato">{{ $soloWins }}V / {{ $soloLosses }}D ({{ $soloWinRate }}%)</div>
                    </div>
                    <div class="progreso-rango">
                        <div class="progreso-rango-barra" style="width: {{ $soloLPProgress }}%;" data-lp="{{ $soloLP }} LP"></div>
                    </div>
                </div>
            </div>

            <div class="rango-container">
                <div class="rango-emblem">
                    <img src="{{ asset('Img/LOL/Rangos/sinRango.png') }}" alt="Emblema de rango solo">
                </div>
                <div class="rango-info">
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">Cola Flexible:</div>
                        <div class="valor-dato resaltado">{{ $flexRank }} {{ $flexTier }}</div>
                    </div>
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">LP:</div>
                        <div class="valor-dato tooltip">
                            {{ $flexLP }}
                            <span class="tooltip-text">Puntos de Liga</span>
                        </div>
                    </div>
                    <div class="dato-jugador">
                        <div class="etiqueta-dato">Victorias/Derrotas:</div>
                        <div class="valor-dato">{{ $flexWins }}V / {{ $flexLosses }}D ({{ $flexWinRate }}%)</div>
                    </div>
                    <div class="progreso-rango">
                        <div class="progreso-rango-barra" style="width: {{ $flexLPProgress }}%;" data-lp="{{ $flexLP }} LP"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="seccion-perfil seccion-maestria">
            <h2 class="titulo-seccion">Maestría de Campeones</h2>
            <div class="maestria-container">
                @foreach($championMasteries as $mastery)
                    <div class="maestria-item">
                        <div class="maestria-icono">
                            <img src="{{ $mastery['icon'] }}" alt="{{ $mastery['name'] }}">
                        </div>
                        <div class="maestria-puntos">{{ number_format($mastery['points']) }} puntos</div>
                        <div>Nivel {{ $mastery['level'] }}</div>
                        <div style="color: #9DA3B7; font-size: 14px;">{{ $mastery['name'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="seccion-perfil seccion-estadisticas">
            <h2 class="titulo-seccion">Estadísticas Generales</h2>
            <div class="estadisticas-grid">
                <div class="estadistica-item">
                    <div class="estadistica-valor">{{ $totalGames }}</div>
                    <div class="estadistica-etiqueta">Partidas Totales</div>
                </div>
                <div class="estadistica-item">
                    <div class="estadistica-valor">{{ $winRate }}%</div>
                    <div class="estadistica-etiqueta">Ratio de Victoria</div>
                </div>
                <div class="estadistica-item">
                    <div class="estadistica-valor">{{ $kda }}</div>
                    <div class="estadistica-etiqueta">KDA Promedio</div>
                </div>
                <div class="estadistica-item">
                    <div class="estadistica-valor">{{ $mainRole }}</div>
                    <div class="estadistica-etiqueta">Rol Principal</div>
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('home') }}" class="btn-volver">Volver al Inicio</a>
        </div>
    </div>

    <div class="pie-pagina">
        <p>© 2025 Visualizador de Perfil de League of Legends</p>
    </div>
</div>
</body>
</html>
