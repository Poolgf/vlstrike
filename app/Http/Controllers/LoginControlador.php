<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginControlador extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return back()->withErrors(['correo' => 'El usuario no existe.']);
        }

        if (!Hash::check($request->contrasena, $usuario->contrasena)) {
            return back()->withErrors(['contrasena' => 'La contraseña no es correcta.']);
        }

        //Aqui tendre que actualizar la imagen que tiene el usuario por si ha cambiado y el rango por si se ha actualizado.
        Auth::login($usuario);
        session(['puuid' => $usuario->puuid]);

        return redirect()->route('home')   ->with('success', 'Usuario logueado correctamente.');
    }
}
