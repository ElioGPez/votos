<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = "clientes";
    protected $primaryKey ="id";

	protected $filable = [
        'nombre',
        'telefono',
        'direccion',
        'estado'
    ];

    public function venta()
    {
        return $this->hasMany('App\Venta');
    }
}
