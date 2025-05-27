<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranks - League of Legends</title>
    <link rel="stylesheet" href="{{ asset('css/Chat/todosRangos.css') }}">
    <script src="{{ asset('js/Chat/todosRangos.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<a href="{{ route('home') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>

<link rel="stylesheet" href="{{ asset('css/Header/header.css') }}">
<header class="header">
    <div class="header-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('Img/LogoPagina.png') }}" alt="Logo Pagina"></a>
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

<div class="container">
    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'iron']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Iron.png') }}" alt="Iron">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'bronze']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Bronze.png') }}" alt="Bronze">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'silver']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Silver.png') }}" alt="Silver">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'gold']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Gold.png') }}" alt="Gold">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'platinum']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Platinum.png') }}" alt="Platinum">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'emerald']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Emerald.png') }}" alt="Emerald">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'diamond']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Diamond.png') }}" alt="Diamond">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'master']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Master.png') }}" alt="Master">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'grandmaster']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Grandmaster.png') }}" alt="Grandmaster">
            </a>
    </div>

    <div class="rangosFondo">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="highlight"></div>
            <a href="{{ route('mostrarComentarios', ['rango' => 'challenger']) }}">
                <img src="{{ asset('Img/LOL/Rangos/Challenger.png') }}" alt="Challenger">
            </a>
    </div>
</div>

<div class="footer">
    &copy;  2025 VLStrike. Todos los derechos reservados.
</div>

</body>
</html>
