<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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
            session()->flash('alert', 'El usuario no existe.');
            return back();
        }

        if (!Hash::check($request->contrasena, $usuario->contrasena)) {
            session()->flash('alert', 'La contraseña no es correcta.');
            return back();
        }

        Auth::login($usuario);
        session(['puuid' => $usuario->puuid]);

        $apiKey = config('services.riot.key');
        $puuid = $usuario->puuid;

        $summonerResponse = Http::withHeaders([
            'X-Riot-Token' => $apiKey
        ])->get("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/{$puuid}");

        if (!$summonerResponse->successful()) {
            session()->flash('alert', 'No se pudo obtener la información del invocador.');
            return back();
        }

        $summonerData = $summonerResponse->json();
        $summonerId = $summonerData['id'];
        $profileIconId = $summonerData['profileIconId'];
        $profileIconUrl = "http://ddragon.leagueoflegends.com/cdn/15.8.1/img/profileicon/{$profileIconId}.png";

        $rankResponse = Http::withHeaders([
            'X-Riot-Token' => $apiKey
        ])->get("https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/{$summonerId}");

        if ($rankResponse->successful()) {
            foreach ($rankResponse->json() as $entry) {
                if ($entry['queueType'] === 'RANKED_SOLO_5x5') {
                    $soloRank = $entry['tier'];
                    $usuario->rango = strtolower($soloRank);
                    $usuario->icono = $profileIconUrl;
                    $usuario->save();
                    break;
                }
            }
        }

        session()->flash('alert', 'Usuario registrado correctamente.');
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
