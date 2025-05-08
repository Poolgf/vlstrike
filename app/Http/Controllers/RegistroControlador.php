<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegistroControlador extends Controller
{
    public function comprobarUsuario(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:usuario,correo',
            'contrasena' => 'required|string|min:6|confirmed',
            'nombre' => 'required|string',
            'tag' => 'required|string',
        ]);

        $apiKey = config('services.riot.key');

        $gameName = urlencode($request->nombre);
        $tagLine = urlencode($request->tag);

        $gameName = str_replace('+', '%20', $gameName);
        $tagLine = str_replace('+', '%20', $tagLine);
        $tagLine = str_replace('%23', '', $tagLine);

        $response = Http::withHeaders([
            'X-Riot-Token' => $apiKey
        ])->get("https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/{$gameName}/{$tagLine}");

        if (!$response->successful()) {
            return back()->withErrors(['msg' => 'No se pudo obtener el PUUID del jugador. Verifica nombre y tag.']);
        }

        $data = $response->json();
        $puuid = $data['puuid'];

        $summonerResponse = Http::withHeaders([
            'X-Riot-Token' => $apiKey
        ])->get("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/{$puuid}");

        if (!$summonerResponse->successful()) {
            return back()->withErrors(['msg' => 'No se pudo obtener la información del invocador.']);
        }

        $summonerData = $summonerResponse->json();
        $profileIconId = $summonerData['profileIconId'];
        $profileIconUrl = "http://ddragon.leagueoflegends.com/cdn/15.8.1/img/profileicon/{$profileIconId}.png";

        //Aqui tengo que añadir el rango para que pueda acceder a segun que chats
        $usuario = new Usuario();
        $usuario->puuid = $puuid;
        $usuario->correo = $request->correo;
        $usuario->rol = "cliente";
        $usuario->rango = "noRango";
        $usuario->contrasena = Hash::make($request->contrasena);
        $usuario->nombre = $request->nombre;
        $usuario->tag = $request->tag;
        $usuario->icono = $profileIconUrl;

        $usuario->save();

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');

    }
}
