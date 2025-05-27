<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administradores</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Administrador/gestionAdministrador.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<a href="{{ route('home') }}" class="back-arrow">
    <i class="bi bi-arrow-left-circle-fill"></i>
</a>
<main class="main-content">
    <div class="client-grid" id="clientGrid">
        @foreach($usuarios as $usuario)
            <div class="client-card slide-in">
                <div class="client-header">
                    <div class="client-info">
                        <div class="client-avatar">
                            @if($usuario->icono)
                                <img src="{{ asset($usuario->icono) }}" alt="Avatar de {{ $usuario->nombre }}" />
                            @else
                                <i class="fas fa-user-alt"></i>
                            @endif
                        </div>
                        <div>
                            <div class="client-name">{{ $usuario->nombre ?? 'Sin nombre' }}</div>
                            <div class="client-email">{{ $usuario->correo ?? 'Sin email' }}</div>
                        </div>
                    </div>
                    <div class="rank-avatar">
                        @if($usuario->icono)
                        <img src="{{ asset($usuario->rango) }}" alt="Avatar de {{ $usuario->rango }}" />
                         @else
                        <i class="fas fa-user-alt"></i>
                        @endif
                    </div>
                </div>
                <div class="client-footer">
                    <div class="client-date">Desde: {{ $usuario->created_at->format('d/m/Y') }}</div>
                    <div class="action-buttons">
                        @if($usuario->admin)
                            <div class="admin-badge">
                                <i class="fas fa-check-circle"></i> Administrador
                            </div>
                        @else
                            @if(Auth::user()->rol === "admin")
                                <form action="{{ route('hacerAdmin', $usuario->id) }}" method="POST" class="admin-form">
                                    @csrf
                                    <button type="submit" class="admin-button make-admin-btn">
                                        <i class="fas fa-user"></i> Hacer Admin
                                    </button>
                                </form>
                            @endif
                        @endif

                        @if(Auth::user()->rol === "admin")
                            <form action="{{ route('eliminarUsuario', $usuario->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" title="Eliminar usuario">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($usuarios->isNotEmpty())
    <div class="pagination">
        <div class="pagination-item"><i class="fas fa-chevron-left"></i></div>
        <div class="pagination-item active">1</div>
        <div class="pagination-item">2</div>
        <div class="pagination-item">3</div>
        <div class="pagination-item"><i class="fas fa-chevron-right"></i></div>
    </div>
    @endif
</main>

</body>
</html>
