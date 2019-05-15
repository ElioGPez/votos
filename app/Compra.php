<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table = "compras";
    protected $primaryKey ="id";

	protected $filable = [
        'total',
        'fecha',
        'estado'
    ];

    public function linea_compra()
    {
        return $this->hasMany('App\Linea_Compra');
    }
}
