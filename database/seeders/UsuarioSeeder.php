<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
    
        Usuario::create([
        'puuid' => 'aYysy55ePbRuoecf2AeYNsvNxuNLF4jkAOnuuAyCSp_G7obRN1rL5s9t9xij_hSqz9V5N-jQ0RLCXg',
        'rol' => 'admin',
        'rango' => '',
        'correo' => 'paulgf05@gmail.com',
        'contrasena' => Hash::make('123456'),
        'nombre' => 'Kenpachi ツ',
        'tag' => '507',
        'icono' => ''
        ]);
    }
}
