<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Grandmaster - LoL</title>
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

        .contenedor-grandmaster-chat {
            width: 100%;
            max-width: 80%;
            height: 85vh;
            background: rgba(25, 25, 25, 0.9);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6),
            0 0 0 1px rgba(220, 53, 69, 0.1); /* Red Subtle Border */
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

        .header-grandmaster-chat {
            background: rgba(220, 53, 69, 0.2); /* Red Background */
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(220, 53, 69, 0.2); /* Red Border */
            position: relative;
            overflow: hidden;
        }

        .header-grandmaster-chat::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(168, 20, 32, 0.27), /* Red Shine */
                transparent
            );
            animation: headerShineGrandmaster 3s infinite linear;
        }

        @keyframes headerShineGrandmaster {
            from { transform: translateX(-100%); }
            to { transform: translateX(100%); }
        }

        .emblema-grandmaster {
            width: 60px;
            height: 60px;
            animation: grandmasterPulse 2s infinite ease-in-out;
        }

        @keyframes grandmasterPulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
        }

        .emblema-grandmaster img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 15px rgba(220, 53, 69, 0.4)); /* Red Shadow */
        }

        h1 {
            color: #fff;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 15px rgba(220, 53, 69, 0.3); /* Red Shadow */
        }

        .zona-chat-grandmaster {
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
            background: rgba(220, 53, 69, 0.05); /* Red Scrollbar Track */
        }

        .contenedor-mensajes::-webkit-scrollbar-thumb {
            background: rgba(220, 53, 69, 0.3); /* Red Scrollbar Thumb */
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
            background: rgba(220, 53, 69, 0.1); /* Red Background for own messages */
            border: 1px solid rgba(220, 53, 69, 0.2); /* Red Border for own messages */
        }

        .avatar-mensaje {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #5c1e1e 0%, #84302e 100%); /* Darker Red Gradient Avatar */
            border: 2px solid rgba(220, 53, 69, 0.4); /* Red avatar border */
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .avatar-mensaje:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(220, 53, 69, 0.3); /* Red avatar shadow */
        }

        .avatar-mensaje::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 70%;
            height: 70%;
            background: rgba(220, 53, 69, 0.1); /* Red inner circle */
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .contenido-mensaje {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 15px;
            max-width: 70%;
            border: 1px solid rgba(220, 53, 69, 0.1); /* Red message border */
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
            color: rgba(220, 53, 69, 0.6); /* Red text */
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
            border-top: 1px solid rgba(220, 53, 69, 0.1); /* Red form border */
        }

        .entrada-mensaje-grandmaster {
            flex: 1;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(220, 53, 69, 0.1); /* Red input border */
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .entrada-mensaje-grandmaster:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(220, 53, 69, 0.5); /* Red focus border */
            box-shadow: 0 0 20px rgba(220, 53, 69, 0.1); /* Red focus shadow */
        }

        .entrada-mensaje-grandmaster::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .boton-enviar-grandmaster {
            padding: 15px 30px;
            background: linear-gradient(135deg, #84302e 0%, #5c1e1e 100%); /* Darker Red Gradient Button */
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

        .boton-enviar-grandmaster:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3); /* Red button shadow */
        }

        .boton-enviar-grandmaster:active {
            transform: translateY(0);
        }

        .boton-enviar-grandmaster::before {
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

        .boton-enviar-grandmaster:hover::before {
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
            background: rgba(220, 53, 69, 0.5); /* Red typing dot */
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
            0% { transform: scale(1.1); background: rgba(220, 53, 69, 0.1); /* Red pulse background */ }
            100% { transform: scale(1); background: rgba(255, 255, 255, 0.05); }
        }

        @media (max-width: 768px) {
            .contenedor-grandmaster-chat {
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
<div class="contenedor-grandmaster-chat">
    <div class="header-grandmaster-chat">
        <div class="emblema-grandmaster"><img src="{{ asset('Img/LOL/Rangos/Grandmaster.png') }}" alt="Grandmaster" /></div>
        <h1>CHAT GRANDMASTER</h1>
    </div>

    <div class="zona-chat-grandmaster">
        <div class="contenedor-mensajes">
            <div class="mensaje">
                <div class="avatar-mensaje avatar-grandmaster"></div>
                <div class="contenido-mensaje">
                    <div class="encabezado-mensaje">
                        <span class="usuario-mensaje">GrandmasterPlayer1</span>
                        <span class="hora-mensaje">21:30</span>
                    </div>
                    <div class="texto-mensaje">
                        ¿Alguien listo para rankeds? Necesito un buen equipo para subir a Challenger.
                    </div>
                </div>
            </div>

            <div class="mensaje propio">
                <div class="avatar-mensaje avatar-grandmaster"></div>
                <div class="contenido-mensaje">
                    <div class="encabezado-mensaje">
                        <span class="usuario-mensaje">Tú</span>
                        <span class="hora-mensaje">21:32</span>
                    </div>
                    <div class="texto-mensaje">
                        ¡Estoy disponible! ¿Qué posiciones necesitas?
                    </div>
                </div>
            </div>
        </div>

        <form class="formulario-mensaje">
            <input type="text" name="mensaje" placeholder="Escribe un mensaje..." required class="entrada-mensaje-grandmaster">
            <button type="submit" class="boton-enviar-grandmaster">
                <span>Enviar</span>
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messagesContainer = document.querySelector('.contenedor-mensajes');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });

    document.querySelector('.formulario-mensaje').addEventListener('submit', function (e) {
        e.preventDefault();

        const input = document.querySelector('.entrada-mensaje-grandmaster');
        const message = input.value.trim();

        if (message) {
            const messagesContainer = document.querySelector('.contenedor-mensajes');

            const typingIndicator = document.createElement('div');
            typingIndicator.className = 'typing-indicator';
            typingIndicator.innerHTML = `
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            `;
            messagesContainer.appendChild(typingIndicator);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            setTimeout(() => {
                typingIndicator.remove();

                const newMessage = document.createElement('div');
                newMessage.className = 'mensaje propio new-message';
                newMessage.innerHTML = `
                    <div class="avatar-mensaje avatar-grandmaster"></div>
                    <div class="contenido-mensaje">
                        <div class="encabezado-mensaje">
                            <span class="usuario-mensaje">Tú</span>
                            <span class="hora-mensaje">${new Date().getHours()}:${String(new Date().getMinutes()).padStart(2, '0')}</span>
                        </div>
                        <div class="texto-mensaje">
                            ${message}
                        </div>
                    </div>
                `;

                messagesContainer.appendChild(newMessage);
                input.value = '';
                messagesContainer.scrollTop = messagesContainer.scrollHeight;

                setTimeout(() => {
                    newMessage.classList.remove('new-message');
                }, 500);
            }, 1000);
        }
    });
</script>
</body>
</html>
