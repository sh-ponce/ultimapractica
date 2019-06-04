<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donador;

class DonacionesPracticaController extends Controller
{
    public function registrarDonador(Request $request)
    {

        $donador = $request->get('donador');

        //dd

        $newDonador = new Donador;
        $newDonador->nombre = $donador['nombre'];
        $newDonador->save();

        if($newDonador){
            return '1';
        } else {
            return 'No se agrego nada';
        }

        
    }
}
