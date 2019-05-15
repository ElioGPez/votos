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
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->hasMany('App\Producto');
    }
    public function linea_venta()
    {
        return $this->hasMany('App\Linea_Venta');
    }
}
