<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo</title>
    <link rel="stylesheet" href="{{ asset('css/Clasificatoria/editarEquipo.css') }}">
</head>
<body>
<div class="container">
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
                    <input type="number" id="points" name="puntos" min="0" placeholder="{{$equipo->puntos}}">
                </div>
            </div>
            <div class="stats-item">
                <div class="form-group">
                    <label for="wins">VICTORIAS</label>
                    <input type="number" id="wins" name="victorias" min="0" placeholder="{{$equipo->victorias}}">
                </div>
            </div>
            <div class="stats-item">
                <div class="form-group">
                    <label for="losses">DERROTAS</label>
                    <input type="number" id="losses" name="derrotas" min="0" placeholder="{{$equipo->derrotas}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn">Guardar Cambios</button>
    </form>
</div>
</body>
</html>
