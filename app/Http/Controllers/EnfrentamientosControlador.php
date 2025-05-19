<?php

namespace App\Http\Controllers;

use App\Models\Enfrentamiento;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EnfrentamientosControlador extends Controller
{
    public function IntroducirEnfrentamiento(Request $request)
    {
        $equipo1Id = $request->input('equipo1');
        $equipo2Id = $request->input('equipo2');
        $fecha = $request->input('fecha');

        $equipo1 = Equipo::findOrFail($equipo1Id);
        $equipo2 = Equipo::findOrFail($equipo2Id);

        $nombreEquipo1 = $equipo1->nombre;
        $imagenEquipo1 = $equipo1->imagen;

        $nombreEquipo2 = $equipo2->nombre;
        $imagenEquipo2 = $equipo2->imagen;

        Enfrentamiento::create([
            'nombre1' => $nombreEquipo1,
            'imagen1' => $imagenEquipo1,
            'nombre2' => $nombreEquipo2,
            'imagen2' => $imagenEquipo2,
            'fecha' => $fecha,
        ]);
        session()->flash('alert', 'Enfrentamiento creado con exito.');
        return redirect()->route('mostrarPartidos');

    }

    public function mostrarPartidos()
    {
        $partidos = Enfrentamiento::all();

        return view('Enfrentamientos/enfrentamientos', compact('partidos'));
    }

    public function eliminarEnfrentamiento($id)
    {
        $enfrentamiento = Enfrentamiento::findOrFail($id);

        $enfrentamiento->delete();

        session()->flash('alert', 'Enfrentamiento eliminado con exito.');
        return redirect()->back();
    }

}
