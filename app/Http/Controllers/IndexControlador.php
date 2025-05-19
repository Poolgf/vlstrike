<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class IndexControlador extends Controller
{
   
    public function mostrarIndex()
    {

        return view('Index/welcome');

    }


}
