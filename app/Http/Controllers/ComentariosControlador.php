<?php
namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ComentariosControlador extends Controller
{
    public function introducirComentario(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para comentar.');
        }

        $usuario = Auth::user();
        $usuarioId = $usuario->id;
        $usuarioRango = $usuario->rango;
        $comentario = $request->comentario;

        if (empty($comentario)) {
            return back()->with('error', 'El comentario no puede estar vacío.');
        }

        Comentario::create([
            'rango' => $usuarioRango,
            'usuario_id' => $usuarioId,
            'comentario' => $comentario
        ]);

        return redirect()->route('mostrarComentarios', ['rango' => $usuarioRango])
            ->with('success', 'Comentario enviado correctamente.');
    }


    public function mostrarComentarios($rango)
    {
        $rangosValidos = [
            'iron', 'bronze', 'silver', 'gold', 'platinum',
            'emerald', 'diamond', 'master', 'grandmaster', 'challenger'
        ];

        if (!in_array($rango, $rangosValidos)) {
            return redirect()->back()->with('error', 'No tienes un rango asignado.');
        }

        $comentarios = Comentario::where('rango', $rango)
            ->orderBy('created_at', 'asc')
            ->take(50)
            ->get();

        return view('Chat.' . $rango, [
            'comentarios' => $comentarios,
            'rango' => $rango
        ]);
    }

}
