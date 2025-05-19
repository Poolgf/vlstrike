<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LEC Partidos</title>
    <link rel="stylesheet" href="{{ asset('css/Enfrentamientos/enfrentamientos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<a href="{{ route('home') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>

@auth
    @if(auth()->user()->rol === "admin")
        <button class="cssbuttons-io">
            <a href="{{ route('mostrarEquipos') }}">
                <span>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z"
                              fill="currentColor"></path>
                    </svg>
                    Añadir
                </span>
            </a>
        </button>
    @endif
@endauth

<div class="horario">
    @if ($partidos->isEmpty())
        <div class="mensaje-vacio">
            <p>🕹️ No hay partidos disponibles en este momento.</p>
        </div>
    @else
        @foreach ($partidos as $partido)
            <div class="partido">
                @auth
                    @if(auth()->user()->rol === "admin")
                        <form action="{{ route('eliminarEnfrentamiento', $partido->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este enfrentamiento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    @endif
                @endauth

                <div class="equipos">
                    <div class="equipo">
                        <span>{{ $partido->nombre1 }}</span>
                        <img src="{{ asset('Img/LOL/EquiposLOL/' . $partido->imagen1) }}" alt="{{ $partido->nombre1 }} Logo" />
                    </div>

                    <button class="fondoVersus">VS</button>

                    <div class="equipo">
                        <img src="{{ asset('Img/LOL/EquiposLOL/' . $partido->imagen2) }}" alt="{{ $partido->nombre2 }} Logo" />
                        <span>{{ $partido->nombre2 }}</span>
                    </div>
                </div>

                <div class="detalles">
                    <img src="{{ asset('Img/logoLEC.png') }}" alt="LEC Logo" />
                    <span class="contadorPartido">{{ $partido->fecha }}</span>
                </div>
            </div>
        @endforeach
    @endif
</div>

@if(session('alert'))
    <script>
        alert(@json(session('alert')));
    </script>
@endif

</body>
</html>
