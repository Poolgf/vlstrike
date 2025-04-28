<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VLStrike</title>
    <link rel="stylesheet" href="{{ asset('css/Index/index.css') }}">
    <script src="{{ asset('js/Index/index.js') }}"></script>
</head>
<body>
<div class="animated-bg">
    <!-- Hexágonos animados generados con JavaScript -->
</div>

<header class="header">
    <div class="header-logo">
        <a href="../"><img src="{{ asset('Img/LogoPagina.png') }}" alt="Logo Pagina"></a>
    </div>
    <button class="ui-btn">
        <span>
            VLStrike
        </span>
    </button>

    @auth
        <div class="user-profile">
            <a href="{{ route('jugador', Auth::id()) }}">
                <img src="{{ Auth::user()->icono }}"
                     alt="Foto de perfil"
                     class="profile-photo">
            </a>
            <span class="username">{{ Auth::user()->nombre }}</span>
        </div>
    @else
        <a href="login" class="login-button">Iniciar Sesión</a>
    @endauth
</header>

<main class="main-content">
    <div class="container">
        <div class="hero">
            <h1>VLStrike</h1>
            <p>La plataforma definitiva para seguir League of Legends profesional y conectar con la comunidad</p>
        </div>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">▶</div>
                <h2 class="feature-title">Ver Partidos</h2>
                <p class="feature-description">Sigue los mejores enfrentamientos profesionales en directo, con estadísticas en tiempo real y análisis detallado</p>
                <a href="/enfrentamientos" class="feature-button">Ver Ahora</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h2 class="feature-title">Comunidad</h2>
                <p class="feature-description">Únete a la conversación con otros fans de LoL, discute estrategias y encuentra gente para jugar</p>
                <a href="/rangosLOL" class="feature-button">Unirse</a>
            </div>
        </div>

        <!-- Nueva tarjeta de clasificación -->
        <div class="classification-container">
            <div class="feature-card classification-card">
                <div class="feature-icon">🏅</div>
                <h2 class="feature-title">Clasificaciones</h2>
                <p class="feature-description">Consulta las tablas de clasificación de todas las ligas, sigue el rendimiento de tus equipos favoritos y descubre los mejores jugadores</p>
                <a href="/clasificatoria" class="feature-button">Ver Clasificación</a>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <p>&copy; 2024 VLStrike. Todos los derechos reservados.</p>
</footer>
</body>
</html>
