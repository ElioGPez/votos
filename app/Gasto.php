<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
	protected $table = "gastos";
    protected $primaryKey ="id";

	protected $filable = [
        'total',
        'fecha',
        'estado'
    ];

    public function linea_gasto()
    {
        return $this->hasMany('App\Linea_Gasto');
    }
}
