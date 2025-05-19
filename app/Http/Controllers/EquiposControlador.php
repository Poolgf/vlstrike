<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EquiposControlador extends Controller
{
    public function mostrarEquipos()
    {
        $equipos = Equipo::all();

        return view('Enfrentamientos/crearEnfrentamiento', compact('equipos'));
    }

    public function mostrarEquiposOrdenadosPorPuntos()
    {
        $equipos = Equipo::orderBy('puntos', 'desc')->get();

        return view('Clasificatoria/clasificatoria', compact('equipos'));
    }

    public function editarEquipo($id)
    {
        $equipo = Equipo::findOrFail($id);

        return view('Clasificatoria/editarEquipo', compact('equipo'));

    }

    public function actualizarEquipo(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        $equipo->puntos = $request->input('puntos');
        $equipo->victorias = $request->input('victorias');
        $equipo->derrotas = $request->input('derrotas');

        $equipo->save();

        session()->flash('alert', 'Equipo editado con exito.');
        return redirect()->route('equiposOrdenadosPorPuntos');
    }


}
