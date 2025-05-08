<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Challenger - LoL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contenedor-challenger-chat {
            width: 100%;
            max-width: 80%;
            height: 85vh;
            background: rgba(25, 25, 25, 0.9);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6),
            0 0 0 1px rgba(80, 190, 255, 0.1); /* Azul brillante border */
            backdrop-filter: blur(20px);
            display: flex;
            flex-direction: column;
            animation: fadeInUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-challenger-chat {
            background: rgba(32, 32, 32, 0.95);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(196, 164, 78, 0.3); /* Dorado border */
            position: relative;
            overflow: hidden;
        }

        .header-challenger-chat::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(80, 190, 255, 0.2), /* Azul brillante shine */
                transparent
            );
            animation: headerShineChallenger 3s infinite linear;
        }

        @keyframes headerShineChallenger {
            from { transform: translateX(-100%); }
            to { transform: translateX(100%); }
        }

        .emblema-challenger {
            width: 60px;
            height: 60px;
            animation: challengerPulse 2s infinite ease-in-out;
        }

        @keyframes challengerPulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
        }

        .emblema-challenger img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 15px rgba(80, 190, 255, 0.6)); /* Azul brillante shadow */
        }

        h1 {
            color: #c4a44e; /* Dorado para el título */
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 15px rgba(80, 190, 255, 0.3); /* Azul brillante shadow */
        }

        .zona-chat-challenger {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .contenedor-mensajes {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contenedor-mensajes::-webkit-scrollbar {
            width: 8px;
        }

        .contenedor-mensajes::-webkit-scrollbar-track {
            background: rgba(32, 32, 32, 0.5);
        }

        .contenedor-mensajes::-webkit-scrollbar-thumb {
            background: rgba(196, 164, 78, 0.3); /* Dorado scrollbar */
            border-radius: 4px;
        }

        .mensaje {
            display: flex;
            gap: 15px;
            animation: messageSlideIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: left;
        }

        @keyframes messageSlideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .mensaje.propio {
            flex-direction: row-reverse;
            transform-origin: right;
        }

        .mensaje.propio .contenido-mensaje {
            background: rgba(25, 25, 25, 0.8);
            border: 1px solid rgba(80, 190, 255, 0.3); /* Azul brillante border */
        }

        .avatar-mensaje {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
            border: 2px solid rgba(200, 200, 200, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-mensaje:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(200, 200, 200, 0.5);
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        .avatar-fallback {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
            position: relative;
        }

        .avatar-fallback::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 70%;
            height: 70%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .contenido-mensaje {
            background: rgba(32, 32, 32, 0.7);
            padding: 15px;
            border-radius: 15px;
            max-width: 70%;
            border: 1px solid rgba(196, 164, 78, 0.2); /* Dorado message border */
            transition: all 0.3s ease;
        }

        .contenido-mensaje:hover {
            background: rgba(32, 32, 32, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(196, 164, 78, 0.4); /* Dorado hover border */
        }

        .encabezado-mensaje {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            color: rgba(80, 190, 255, 0.7); /* Azul brillante text */
            font-size: 14px;
        }

        .usuario-mensaje {
            font-weight: bold;
            color: #c4a44e; /* Dorado username */
        }

        .texto-mensaje {
            color: #fff;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .formulario-mensaje {
            padding: 20px;
            background: rgba(16, 16, 16, 0.8);
            display: flex;
            gap: 15px;
            align-items: center;
            border-top: 1px solid rgba(196, 164, 78, 0.2); /* Dorado form border */
        }

        .entrada-mensaje-challenger {
            flex: 1;
            padding: 15px 20px;
            background: rgba(32, 32, 32, 0.7);
            border: 1px solid rgba(196, 164, 78, 0.2); /* Dorado input border */
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .entrada-mensaje-challenger:focus {
            outline: none;
            background: rgba(32, 32, 32, 0.9);
            border-color: rgba(80, 190, 255, 0.5); /* Azul brillante focus border */
            box-shadow: 0 0 20px rgba(80, 190, 255, 0.2); /* Azul brillante focus shadow */
        }

        .entrada-mensaje-challenger::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .boton-enviar-challenger {
            padding: 15px 30px;
            background: linear-gradient(135deg, #c4a44e 0%, #9c7f38 100%); /* Dorado gradient button */
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .boton-enviar-challenger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(80, 190, 255, 0.3); /* Azul brillante button shadow */
        }

        .boton-enviar-challenger:active {
            transform: translateY(0);
        }

        .boton-enviar-challenger::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(80, 190, 255, 0.4),
                transparent
            );
            transition: 0.5s;
        }

        .boton-enviar-challenger:hover::before {
            left: 100%;
        }

        .typing-indicator {
            display: flex;
            gap: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: rgba(80, 190, 255, 0.5); /* Azul brillante typing dot */
            border-radius: 50%;
            animation: typingAnimation 1s infinite;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typingAnimation {
            0%, 100% { transform: translateY(0); opacity: 0.5; }
            50% { transform: translateY(-10px); opacity: 1; }
        }

        .new-message {
            animation: newMessagePulse 0.5s ease-out;
        }

        @keyframes newMessagePulse {
            0% { transform: scale(1.1); background: rgba(80, 190, 255, 0.15); /* Azul brillante pulse */ }
            100% { transform: scale(1); background: rgba(32, 32, 32, 0.7); }
        }

        @media (max-width: 768px) {
            .contenedor-challenger-chat {
                height: 100vh;
                border-radius: 0;
            }

            .contenido-mensaje {
                max-width: 80%;
            }
        }
    </style>
</head>
<body>
<div class="contenedor-challenger-chat">
    <div class="header-challenger-chat">
        <div class="emblema-challenger"><img src="{{ asset('Img/LOL/Rangos/Challenger.png') }}" alt="Challenger" /></div>
        <h1>CHAT CHALLENGER</h1>
    </div>

    <div class="zona-chat-challenger">
        <div class="contenedor-mensajes">
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

        @if(Auth::user()->rango === 'challenger')
        <form class="formulario-mensaje" action="{{ route('introducirComentario', ['rango' => 'challenger']) }}" method="POST">
            @csrf
            <input type="text" name="comentario" placeholder="Escribe un mensaje..." required class="entrada-mensaje-challenger">
            <button type="submit" class="boton-enviar-challenger">
                <span>Enviar</span>
            </button>
        </form>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messagesContainer = document.querySelector('.contenedor-mensajes');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });
</script>
</body>
</html>
