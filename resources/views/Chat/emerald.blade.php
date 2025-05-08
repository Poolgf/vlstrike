<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Esmeralda - LoL</title>
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

        .contenedor-esmeralda-chat {
            width: 100%;
            max-width: 80%;
            height: 85vh;
            background: rgba(25, 25, 25, 0.9);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6),
            0 0 0 1px rgba(144, 238, 144, 0.1);
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

        .header-esmeralda-chat {
            background: rgba(144, 238, 144, 0.05);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(144, 238, 144, 0.1);
            position: relative;
            overflow: hidden;
        }

        .header-esmeralda-chat::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(144, 238, 144, 0.2),
                transparent
            );
            animation: headerShineEsmeralda 3s infinite linear;
        }

        @keyframes headerShineEsmeralda {
            from { transform: translateX(-100%); }
            to { transform: translateX(100%); }
        }

        .emblema-esmeralda {
            width: 60px;
            height: 60px;
            animation: esmeraldaPulse 2s infinite ease-in-out;
        }

        @keyframes esmeraldaPulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(10deg); }
        }

        .emblema-esmeralda img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 15px rgba(144, 238, 144, 0.4));
        }

        h1 {
            color: #fff;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 15px rgba(144, 238, 144, 0.3);
        }

        .zona-chat-esmeralda {
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
            background: rgba(144, 238, 144, 0.05);
        }

        .contenedor-mensajes::-webkit-scrollbar-thumb {
            background: rgba(144, 238, 144, 0.3);
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
            background: rgba(144, 238, 144, 0.1);
            border: 1px solid rgba(144, 238, 144, 0.2);
        }

        .avatar-mensaje {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #386641 0%, #6a994e 100%);
            border: 2px solid rgba(144, 238, 144, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .avatar-mensaje:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(144, 238, 144, 0.3);
        }

        .avatar-mensaje::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 70%;
            height: 70%;
            background: rgba(144, 238, 144, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .contenido-mensaje {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 15px;
            max-width: 70%;
            border: 1px solid rgba(144, 238, 144, 0.1);
            transition: all 0.3s ease;
        }

        .contenido-mensaje:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .encabezado-mensaje {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            color: rgba(144, 238, 144, 0.6);
            font-size: 14px;
        }

        .usuario-mensaje {
            font-weight: bold;
            color: #fff;
        }

        .texto-mensaje {
            color: #fff;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .formulario-mensaje {
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            gap: 15px;
            align-items: center;
            border-top: 1px solid rgba(144, 238, 144, 0.1);
        }

        .entrada-mensaje-esmeralda {
            flex: 1;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(144, 238, 144, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .entrada-mensaje-esmeralda:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(144, 238, 144, 0.5);
            box-shadow: 0 0 20px rgba(144, 238, 144, 0.1);
        }

        .entrada-mensaje-esmeralda::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .boton-enviar-esmeralda {
            padding: 15px 30px;
            background: linear-gradient(135deg, #8fbc8f 0%, #98fb98 100%);
            border: none;
            border-radius: 10px;
            color: #1a291c;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .boton-enviar-esmeralda:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(144, 238, 144, 0.3);
        }

        .boton-enviar-esmeralda:active {
            transform: translateY(0);
        }

        .boton-enviar-esmeralda::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: 0.5s;
        }

        .boton-enviar-esmeralda:hover::before {
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
            background: rgba(144, 238, 144, 0.5);
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
            0% { transform: scale(1.1); background: rgba(144, 238, 144, 0.1);}
            100% { transform: scale(1); background: rgba(255, 255, 255, 0.05); }
        }

        @media (max-width: 768px) {
            .contenedor-esmeralda-chat {
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
<div class="contenedor-esmeralda-chat">
    <div class="header-esmeralda-chat">
        <div class="emblema-esmeralda"><img src="{{ asset('Img/LOL/Rangos/Emerald.png') }}" alt="Esmeralda" /></div>
        <h1>CHAT ESMERALDA</h1>
    </div>

    <div class="zona-chat-esmeralda">
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

        @if(Auth::user()->rango === 'emerald')
            <form class="formulario-mensaje" action="{{ route('introducirComentario', ['rango' => 'emerald']) }}" method="POST">
                @csrf
                <input type="text" name="comentario" placeholder="Escribe un mensaje..." required class="entrada-mensaje-esmeralda">
                <button type="submit" class="boton-enviar-esmeralda">
                    <span>Enviar</span>
                </button>
            </form>
        @endif
    </div>
</div>
</body>
</html>
