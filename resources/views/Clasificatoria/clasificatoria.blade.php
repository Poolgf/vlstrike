<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOL CLASIFICATORIA-LEC 2025</title>
    <link rel="stylesheet" href="{{ asset('css/Clasificatoria/clasificatoria.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<a href="{{ route('home') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>
<div class="background-effects">
    <div class="grid-overlay"></div>
    <div class="floating-particles"></div>
</div>

<div class="side-decoration left"></div>
<div class="side-decoration right"></div>

<div class="container">
    <h1 class="title">LEAGUE RANKINGS</h1>
    <div class="ranking-container">
        @foreach ($equipos as $index => $equipo)
            <div class="rank-card">
                <div class="rank-position {{ $index == 0 ? 'gold' : ($index == 1 ? 'silver' : ($index == 2 ? 'bronze' : '')) }}">
                    {{ $index + 1 }}
                </div>
            <div class="team-info">
                <div class="team-logo">
                    <img src="{{ asset('Img/LOL/EquiposLOL/' . $equipo->imagen) }}" alt="{{ $equipo->nombre }}" class="team-logo-img">
                </div>
                <div class="team-name">{{$equipo->nombre}}</div>
            </div>
            <div class="team-points-container">
                <div class="team-points">{{$equipo->puntos}}</div>
                <div class="points-label">PUNTOS</div>
            </div>
            <div class="team-stats">
                <div class="team-record">{{$equipo->victorias}} - {{$equipo->derrotas}}</div>
                <div class="win-rate-bar">
                    <div class="win-rate-fill" style="width: 80%"></div>
                    <div class="win-rate-text">  {{ round(($equipo->victorias / ($equipo->victorias + $equipo->derrotas)) * 100, 2) }}%WR</div>
                </div>
            </div>
                @auth
                    @if (auth()->user()->rol === 'admin')
                        <a href="{{ route('editarEquipo', $equipo->id) }}">
                            <button class="admin-edit-btn">
                                <span class="admin-edit-icon">✏️</span>
                            </button>
                        </a>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/Clasificatoria/efectosClasificatoria.js') }}"></script>
</body>
</html>
