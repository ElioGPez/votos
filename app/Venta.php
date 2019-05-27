<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $table = "ventas";
    protected $primaryKey ="id";

	protected $filable = [
        'total',
        'fecha',
        'estado',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->hasMany('App\Cliente');
    }
    public function linea_venta()
    {
        return $this->hasMany('App\Linea_Venta');
    }
}
