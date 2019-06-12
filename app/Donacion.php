<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';
    public $timestamps = false;

        public function beneficiario(){
        return $this->hasOne('\App\Beneficiario', 'id', 'beneficiario_id');
        }

        public function donador(){
        return $this->hasOne('\App\Donador', 'id', 'donador_id');
        }
}
