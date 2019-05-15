<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = "usuarios";
    protected $primaryKey ="id";

	protected $filable = [
        'nombre',
        'telefono',
        'direccion'
    ];

    public function venta()
    {
        return $this->hasMany('App\Venta');
    }
}
