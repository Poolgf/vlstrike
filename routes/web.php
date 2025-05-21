<?php

use App\Http\Controllers\AdministradorControlador;
use App\Http\Controllers\ComentariosControlador;
use App\Http\Controllers\EnfrentamientosControlador;
use App\Http\Controllers\EquiposControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\RiotControlador;
use App\Http\Controllers\RegistroControlador;
use Illuminate\Support\Facades\Route;


/*--------------------------------------------Login----------------------------------------------------*/

Route::get('/login', function () {
    return view('Login/login');
})->name('login');

Route::post('/login', [LoginControlador::class, 'login'])->name('loguearUsuario');

/*--------------------------------------------Registro----------------------------------------------------*/

Route::post('/registro', [RegistroControlador::class, 'comprobarUsuario'])->name('comprobarUsuario');

Route::get('/registro', function () {
    return view('Registro/registro');
});

/*--------------------------------------------------------------------------------------------------------*/

    /*-------------------------------------------Home-----------------------------------------------------*/

    Route::get('/index', function () {
        return view('Index/welcome');
    })->name('home');

    /*-------------------------------------------Rangos-----------------------------------------------------*/

    Route::get('/rangosLOL/{rango}', [ComentariosControlador::class, 'mostrarComentarios'])->name('mostrarComentarios');

    Route::post('/rangosLOL/{rango}', [ComentariosControlador::class, 'introducirComentario'])->name('introducirComentario');

    Route::get('/rangosLOL', function () {
        return view('rangosLOL');
    })->name('rangosLOL');

    /*-------------------------------------------Administrador-----------------------------------------------------*/

    Route::get('/gestionAdministrador', [AdministradorControlador::class, 'usuarios'])->name('mostrarUsuarios');

    Route::post('/gestionAdministrador/{id}', [AdministradorControlador::class, 'hacerAdministrador'])->name('hacerAdmin');

    Route::delete('/gestionAdministrador/{id}', [AdministradorControlador::class, 'eliminarUsuario'])->name('eliminarUsuario');

    /*--------------------------------------------------------------------------------------------------------*/

    Route::get('/enfrentamientos', [EnfrentamientosControlador::class, 'mostrarPartidos'])->name('mostrarPartidos');

    Route::delete('/enfrentamientos/{id}', [EnfrentamientosControlador::class, 'eliminarEnfrentamiento'])->name('eliminarEnfrentamiento');

    Route::get('/crearEnfrentamiento', [EquiposControlador::class, 'mostrarEquipos'])->name('mostrarEquipos');

    Route::post('/crearEnfrentamiento', [EnfrentamientosControlador::class, 'IntroducirEnfrentamiento'])->name('anadirPartido');

    Route::get('/clasificatoria', [EquiposControlador::class, 'mostrarEquiposOrdenadosPorPuntos'])->name('equiposOrdenadosPorPuntos');

    Route::get('/clasificatoria/{id}', [EquiposControlador::class, 'editarEquipo'])->name('editarEquipo');

    Route::put('/clasificatoria/{id}', [EquiposControlador::class, 'actualizarEquipo'])->name('actualizarEquipo');

    /*--------------------------------------------Riot-API----------------------------------------------------*/

    Route::get('/home/perfilUsuario/{id}', [RiotControlador::class, 'conseguirJugador'])->name('jugador');

    /*--------------------------------------------------------------------------------------------------------*/

    // Ruta temporal para ver el log de Laravel (¡eliminar después de depurar!)
    Route::get('/log', function () {
        try {
            $logPath = storage_path('logs/laravel.log');
            if (!file_exists($logPath)) {
                return 'No existe el archivo de log.';
            }
            return '<pre>' . e(file_get_contents($logPath)) . '</pre>';
        } catch (Exception $e) {
            return 'Error leyendo el log: ' . $e->getMessage();
        }
    });
/*--------------------------------------------------------------------------------------------------------*/





