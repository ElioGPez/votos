<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Gasto extends Model
{
	protected $table = "linea_gastos";
    protected $primaryKey ="id";

	protected $filable = [
        'subtotal',
        'precio',
        'cantidad',
        'gasto_id',
        'producto_id'
    ];

    public function gasto()
    {
        return $this->belongsTo('App\Gasto');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
