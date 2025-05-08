<?php

use App\Http\Controllers\ComentariosControlador;
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

    Route::get('/rangosLOL/{rango}', [ComentariosControlador::class, 'mostrarComentarios'])->name('mostrarComentarios');

    Route::post('/rangosLOL/{rango}', [ComentariosControlador::class, 'introducirComentario'])->name('introducirComentario');

    Route::get('/rangosLOL', function () {
        return view('rangosLOL');
    });

    /*--------------------------------------------------------------------------------------------------------*/

    Route::get('/enfrentamientos', [EnfrentamientosControlador::class, 'mostrarPartidos'])->name('mostrarPartidos');

    Route::get('/crearEnfrentamiento', [EquiposControlador::class, 'mostrarEquipos'])->name('mostrarEquipos');

    Route::post('/crearEnfrentamiento', [EnfrentamientosControlador::class, 'IntroducirEnfrentamiento'])->name('anadirPartido');

    Route::get('/clasificatoria', [EquiposControlador::class, 'mostrarEquiposOrdenadosPorPuntos'])->name('equiposOrdenadosPorPuntos');

    Route::get('/clasificatoria/{id}', [EquiposControlador::class, 'editarEquipo'])->name('editarEquipo');

    Route::put('/clasificatoria/{id}', [EquiposControlador::class, 'actualizarEquipo'])->name('actualizarEquipo');

    /*--------------------------------------------Riot-API----------------------------------------------------*/

    Route::get('/home/perfilUsuario/{id}', [RiotControlador::class, 'conseguirJugador'])->name('jugador');

    /*--------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------*/

});




