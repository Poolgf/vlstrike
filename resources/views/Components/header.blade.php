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
