<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donador;
use App\Beneficiario;

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

    public function registrarBeneficiario(Request $request)
    {
        $beneficiario = $request->get('beneficiario');

        $newBeneficiario = new Beneficiario;
        $newBeneficiario->nombre = $beneficiario['nombre'];
        $newBeneficiario->save();

        if($newBeneficiario){
            return '1';
        }else{
            return 'No se guardo nada';
        }
    }
    public function obtenerDonadores(Request $request)
    {
        return Donador::all();
    }
    public function obtenerBeneficiario(Request $request){
        return Beneficiario::all();
    }
    public function donacionfinal(Request $request){


    }


}

