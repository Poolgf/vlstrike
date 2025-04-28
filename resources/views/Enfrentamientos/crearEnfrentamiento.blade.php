<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programar Partido - League of Legends</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/Clasificatoria/crearEnfrentamiento.css') }}">
    <script src="{{ asset('js/Enfrentamiento/crearEnfrentamiento.js') }}"></script>
</head>
<body>
<div class="form-container">
    <div class="hexagon-grid"></div>
    <div class="corner-accent top-left"></div>
    <div class="corner-accent bottom-right"></div>

    <div class="form-header">
        <div class="match-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M21.5,1h-19C1.7,1,1,1.7,1,2.5v19C1,22.3,1.7,23,2.5,23h19c0.8,0,1.5-0.7,1.5-1.5v-19C23,1.7,22.3,1,21.5,1z M12,18 c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18z M12,8c-2.2,0-4,1.8-4,4s1.8,4,4,4s4-1.8,4-4S14.2,8,12,8z"/>
            </svg>
        </div>
        <h1>Programar Partido</h1>
        <p>Configura los detalles del enfrentamiento épico</p>
    </div>

    <form action="{{ route('anadirPartido') }}" method="POST">
        @csrf

        <div class="team-section">
            <div class="card-glow"></div>
            <h3><span class="team-number">1</span> Equipo Local</h3>
            <div class="form-group">
                <label for="equipo1">Seleccionar Equipo</label>
                <select id="equipo1" name="equipo1" class="team-select" required>
                    <option value="">Selecciona un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" data-imagen="{{ $equipo->imagen  }}">
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="preview1" class="team-preview" style="display: none;">
                <img src="" alt="Logo" class="team-logo">
                <span class="team-name"></span>
            </div>
        </div>

        <div class="divider">
            <span>VS</span>
        </div>

        <div class="team-section">
            <div class="card-glow"></div>
            <h3><span class="team-number">2</span> Equipo Visitante</h3>
            <div class="form-group">
                <label for="equipo2">Seleccionar Equipo</label>
                <select id="equipo2" name="equipo2" class="team-select" required>
                    <option value="">Selecciona un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" data-imagen="{{ $equipo->imagen }}">
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="preview2" class="team-preview" style="display: none;">
                <img src="" alt="Logo" class="team-logo">
                <span class="team-name"></span>
            </div>
        </div>

        <div class="schedule-divider">
            <span> SELECCIONA EL HORARIO </span>
        </div>

        <div class="team-section">
            <div class="card-glow"></div>
            <h3>📅 Programación</h3>
            <div class="form-group">
                <label for="fecha">Fecha del Partido</label>
                <input type="text" id="fecha" name="fecha" required placeholder="Selecciona una fecha">
            </div>
        </div>

        <button type="submit" class="submit-btn">Guardar Partido</button>
    </form>
</div>

<!--Explicar para que sirve cada uno-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/es.js"></script>
</body>
</html>
