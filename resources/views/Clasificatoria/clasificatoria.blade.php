<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOL CLASIFICATORIA-LEC 2025</title>
    <link rel="stylesheet" href="{{ asset('css/Clasificatoria/clasificatoria.css') }}">
</head>
<body>
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

<script>
    // Crear partículas flotantes
    function createParticles() {
        const container = document.querySelector('.floating-particles');
        const particleCount = 30;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';

            const size = Math.random() * 4 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;

            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';

            particle.style.animation = `float ${Math.random() * 10 + 15}s linear infinite`;
            particle.style.animationDelay = `-${Math.random() * 10}s`;

            container.appendChild(particle);
        }
    }

    // Agregar animación de flotación personalizada
    const style = document.createElement('style');
    style.textContent = `
            @keyframes float {
                0% { transform: translate(0, 0) rotate(0deg); opacity: 0; }
                10% { opacity: 0.5; }
                90% { opacity: 0.5; }
                100% { transform: translate(100px, -100vh) rotate(360deg); opacity: 0; }
            }
        `;
    document.head.appendChild(style);

    createParticles();

    // Efecto de luz en el cursor
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.rank-card');
        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            card.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.03) 50%)`;
        });
    });
</script>
</body>
</html>
