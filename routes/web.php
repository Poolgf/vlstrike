<?php

use App\Http\Controllers\EnfrentamientosControlador;
use App\Http\Controllers\EquiposControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\RiotControlador;
use App\Http\Controllers\RegistroControlador;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('Index/welcome');
})->name('home');

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

Route::middleware('auth')->group(function () {

    /*-------------------------------------------Rangos-----------------------------------------------------*/


    Route::get('/rangosLOL/hierro', function () {
        return view('Chat/hierro');
    });

    Route::get('/rangosLOL/bronce', function () {
        return view('Chat/bronce');
    });

    Route::get('/rangosLOL/plata', function () {
        return view('Chat/plata');
    });

    Route::get('/rangosLOL/oro', function () {
        return view('Chat/oro');
    });

    Route::get('/rangosLOL/platino', function () {
        return view('Chat/platino');
    });

    Route::get('/rangosLOL/esmeralda', function () {
        return view('Chat/esmeralda');
    });

    Route::get('/rangosLOL/diamante', function () {
        return view('Chat/diamante');
    });

    Route::get('/rangosLOL/maestro', function () {
        return view('Chat/maestro');
    });

    Route::get('/rangosLOL/grandMaster', function () {
        return view('Chat/grandMaster');
    });

    Route::get('/rangosLOL/challenger', function () {
        return view('Chat/challenger');
    });

    Route::get('/rangosLOL', function () {
        return view('rangosLOL');
    });



    Route::get('/enfrentamientos', [EnfrentamientosControlador::class, 'mostrarPartidos'])->name('mostrarPartidos');

    Route::get('/crearEnfrentamiento', [EquiposControlador::class, 'mostrarEquipos'])->name('mostrarEquipos');

    Route::post('/crearEnfrentamiento', [EnfrentamientosControlador::class, 'IntroducirEnfrentamiento'])->name('anadirPartido');

    Route::get('/clasificatoria', [EquiposControlador::class, 'mostrarEquiposOrdenadosPorPuntos'])->name('equiposOrdenadosPorPuntos');

    Route::get('/clasificatoria/{id}', [EquiposControlador::class, 'editarEquipo'])->name('editarEquipo');

    Route::put('/clasificatoria/{id}', [EquiposControlador::class, 'actualizarEquipo'])->name('actualizarEquipo');

    /*--------------------------------------------Riot-API----------------------------------------------------*/
    Route::get('/home/perfilUsuario/{id}', [RiotControlador::class, 'conseguirJugador'])->name('jugador');

});




