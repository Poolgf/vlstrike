<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdministradorControlador extends Controller
{

    public function hacerAdministrador($id)
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
            $usuario = Usuario::findOrFail($id);

            if ($usuario->id === Auth::id()) {
                return redirect()->back()->with('error', 'No puedes cambiar tu propio rol.');
            }

            $usuario->rol = 'admin';
            $usuario->save();

            return redirect()->back()->with('success', 'El usuario ahora es administrador.');
        }

        return redirect()->back()->with('error', 'No tienes permisos para realizar esta acción.');
    }

    public function usuarios()
    {
        $usuarios = Usuario::where('rol', 'cliente')->get();
        return view('Administrador.gestionAdministrador', ['usuarios' => $usuarios]);
    }

    public function eliminarUsuario($id)
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
        $usuario = Usuario::find($id);

            if ($usuario) {
                $usuario->delete();
                return redirect()->route('mostrarUsuarios')->with('success', 'Usuario eliminado con éxito');
            }else{
                return redirect()->route('mostrarUsuarios')->with('error', 'Usuario no encontrado');
            }

        }else{
            return redirect()->back()->with('error', 'No tienes permisos para realizar esta acción.');
        }
    }

}
