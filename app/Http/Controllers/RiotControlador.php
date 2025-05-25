<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class RiotControlador extends Controller
{
    public function conseguirJugador($id)
    {
        $usuario = Usuario::findOrFail($id);

        if($usuario){
            $puuid = $usuario->puuid;

            $apiKey = config('services.riot.key');
            $summonerResponse = Http::withHeaders([
                'X-Riot-Token' => $apiKey
            ])->get("https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/{$puuid}");

            if (!$summonerResponse->successful()) {
                return back()->withErrors(['msg' => 'No se pudo obtener la información del invocador.']);
            }

            $summonerData = $summonerResponse->json();
            $summonerId = $summonerData['id'];
            $summonerLevel = $summonerData['summonerLevel'];
            $profileIconId = $summonerData['profileIconId'];
            $profileIconUrl = "http://ddragon.leagueoflegends.com/cdn/15.8.1/img/profileicon/{$profileIconId}.png";


            $rankResponse = Http::withHeaders([
                'X-Riot-Token' => $apiKey
            ])->get("https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/{$summonerId}");

            $soloRank = $flexRank = $soloTier = $flexTier = $soloLP = $flexLP = 0;
            $soloWins = $soloLosses = $flexWins = $flexLosses = 0;

            //Aqui tengo que poner el emblema default de no tener rango
            $soloRankEmblem = $flexRankEmblem = '';

            if ($rankResponse->successful()) {
                foreach ($rankResponse->json() as $entry) {
                    if ($entry['queueType'] === 'RANKED_SOLO_5x5') {
                        $soloRank = $entry['tier'];
                        $soloTier = $entry['rank'];
                        $soloLP = $entry['leaguePoints'];
                        $soloWins = $entry['wins'];
                        $soloLosses = $entry['losses'];
                        $soloRankEmblem = "Img/LOL/Rangos/{$soloRank}.png";
                    } elseif ($entry['queueType'] === 'RANKED_FLEX_SR') {
                        $flexRank = $entry['tier'];
                        $flexTier = $entry['rank'];
                        $flexLP = $entry['leaguePoints'];
                        $flexWins = $entry['wins'];
                        $flexLosses = $entry['losses'];
                        $flexRankEmblem = "Img/LOL/Rangos/{$flexRank}.png";
                    }
                }
            }

            $soloLPProgress = min(100, $soloLP);
            $flexLPProgress = min(100, $flexLP);

            $masteryResponse = Http::withHeaders([
                'X-Riot-Token' => $apiKey
            ])->get("https://euw1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/{$puuid}");

            $championMasteries = [];
            if ($masteryResponse->successful()) {
                foreach (array_slice($masteryResponse->json(), 0, 10) as $champ) {
                    $championId = (string) $champ['championId'];

                    $championsData = Http::get('http://ddragon.leagueoflegends.com/cdn/15.8.1/data/es_ES/champion.json')->json();

                    $championName = 'Desconocido';
                    $championIcon = 'https://via.placeholder.com/80?text=?';

                    // Busco el nombre del campeón utilizando su `key`
                    foreach ($championsData['data'] as $key => $champion) {
                        if ($champion['key'] === $championId) {
                            $championName = $champion['name'];
                            $championIcon = "http://ddragon.leagueoflegends.com/cdn/15.8.1/img/champion/{$champion['image']['full']}";
                            break;
                        }
                    }

                    $championMasteries[] = [
                        'name' => $championName,
                        'points' => $champ['championPoints'],
                        'level' => $champ['championLevel'],
                        'icon' => $championIcon
                    ];
                }

            }


            $totalGames = $soloWins + $soloLosses + $flexWins + $flexLosses;
            $totalWins = $soloWins + $flexWins;
            $totalLosses = $soloLosses + $flexLosses;
            $winRate = $totalGames > 0 ? round(($totalWins / $totalGames) * 100) : 0;
            $kda = round((rand(30, 100) / 10), 2);
            $mainRole = ['Top', 'Jungle', 'Mid', 'ADC', 'Support'][rand(0, 4)];

            if(!$soloRankEmblem) {
                $soloRankEmblem = 'Img/LOL/Rangos/sinRango.png'; 
            }
            if(!$flexRankEmblem) {
                $flexRankEmblem = 'Img/LOL/Rangos/sinRango.png';
            }

            return view('Perfil/informacionJugador', [
                'gameName' => $usuario->nombre,
                'tagLine' => $usuario->tag,
                'puuid' => $puuid,
                'summonerLevel' => $summonerLevel,
                'profileIconUrl' => $profileIconUrl,

                'soloRank' => $soloRank,
                'soloTier' => $soloTier,
                'soloLP' => $soloLP,
                'soloWins' => $soloWins,
                'soloLosses' => $soloLosses,
                'soloLPProgress' => $soloLPProgress,
                'soloWinRate' => $soloWins + $soloLosses > 0 ? round($soloWins / ($soloWins + $soloLosses) * 100) : 0,
                'soloRankEmblem' => $soloRankEmblem,

                'flexRank' => $flexRank,
                'flexTier' => $flexTier,
                'flexLP' => $flexLP,
                'flexWins' => $flexWins,
                'flexLosses' => $flexLosses,
                'flexLPProgress' => $flexLPProgress,
                'flexWinRate' => $flexWins + $flexLosses > 0 ? round($flexWins / ($flexWins + $flexLosses) * 100) : 0,
                'flexRankEmblem' => $flexRankEmblem,

                'championMasteries' => $championMasteries,

                'totalGames' => $totalGames,
                'winRate' => $winRate,
                'kda' => $kda,
                'mainRole' => $mainRole,

                'lastConnection' => rand(1, 12)
            ]);
        }else{
            return back()->withErrors(['msg' => 'No se ha encontrado el id del usuario']);
        }
    }
}
