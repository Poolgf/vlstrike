<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Esmeralda - LoL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/Chat/chatEmerald.css') }}">
    <script src="{{ asset('js/Chat/scroll.js') }}"></script>
</head>
<body>
<a href="{{ route('rangosLOL') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>
<div class="contenedor-esmeralda-chat">
    <div class="header-esmeralda-chat">
        <div class="emblema-esmeralda"><img src="{{ asset('Img/LOL/Rangos/Emerald.png') }}" alt="Esmeralda" /></div>
        <h1>CHAT ESMERALDA</h1>
    </div>

    <div class="zona-chat-esmeralda">
        <div class="contenedor-mensajes" id="contenedor-comentarios">
            @foreach($comentarios as $comentario)
                <div class="mensaje {{ $comentario->usuario_id === Auth::id() ? 'propio' : '' }}">
                    <div class="avatar-mensaje">
                        @if($comentario->usuario)
                            <a href="{{ route('jugador', $comentario->usuario_id) }}" class="avatar-link">
                                @if($comentario->usuario->icono)
                                    <img src="{{ asset($comentario->usuario->icono) }}" alt="Avatar de {{ $comentario->usuario->nombre }}" class="avatar-img">
                                @else
                                    <div class="avatar-fallback avatar-{{ $rango }}"></div>
                                @endif
                            </a>
                        @else
                            <div class="avatar-fallback avatar-{{ $rango }}"></div>
                        @endif
                    </div>
                    <div class="contenido-mensaje">
                        <div class="encabezado-mensaje">
                <span class="usuario-mensaje">
                    {{ $comentario->usuario->nombre ?? 'Anónimo' }}
                </span>
                            <span class="hora-mensaje">
                    {{ $comentario->created_at->format('H:i') }}
                </span>
                        </div>
                        <div class="texto-mensaje">
                            {{ $comentario->comentario }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(Auth::user()->rango === 'Emerald')
            <form class="formulario-mensaje" action="{{ route('introducirComentario', ['rango' => 'emerald']) }}" method="POST">
                @csrf
                <input type="text" name="comentario" placeholder="Escribe un mensaje..." required class="entrada-mensaje-esmeralda">
                <button type="submit" class="boton-enviar-esmeralda">
                    <span>Enviar</span>
                </button>
            </form>
        @else
            <div class="mensaje-sin-permiso">
                <p>Solo los jugadores de rango Esmeralda pueden enviar mensajes en este chat.</p>
            </div>
        @endif
    </div>
</div>
</body>
</html>
