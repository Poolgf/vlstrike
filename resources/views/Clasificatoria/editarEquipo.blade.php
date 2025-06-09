<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo</title>
    <link rel="stylesheet" href="{{ asset('css/Clasificatoria/editarEquipo.css') }}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<div class="container">
    <a href="{{ route('equiposOrdenadosPorPuntos') }}" class="back-arrow">
        <i class="bi bi-arrow-left-circle-fill"></i>
    </a>
    <div class="team-info">
        <img src="{{ asset('Img/LOL/EquiposLOL/' . $equipo->imagen) }}" alt="{{ $equipo->nombre }}" class="team-logo">
        <h1>{{$equipo->nombre}}</h1>
    </div>

    <form id="teamStatsForm" method="POST" action="{{ route('actualizarEquipo', $equipo->id) }}">
        @csrf
        @method('PUT')
        <div class="stats-container">
            <div class="stats-item">
                <div class="form-group">
                    <label for="points">PUNTOS</label>
                    <input type="number" id="points" name="puntos" min="0" placeholder="{{$equipo->puntos}}" required>
                </div>
            </div>
            <div class="stats-item">
                <div class="form-group">
                    <label for="wins">VICTORIAS</label>
                    <input type="number" id="wins" name="victorias" min="0" placeholder="{{$equipo->victorias}}" required>
                </div>
            </div>
            <div class="stats-item">
                <div class="form-group">
                    <label for="losses">DERROTAS</label>
                    <input type="number" id="losses" name="derrotas" min="0" placeholder="{{$equipo->derrotas}}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn">Guardar Cambios</button>
    </form>
</div>

@if(session('alert'))
    <script>
        alert(@json(session('alert')));
    </script>
@endif

</body>
</html>
