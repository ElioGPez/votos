<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = "productos";
    protected $primaryKey ="id";

	protected $filable = [
        'producto',
        'descripcion',
        'precio',
        'imagen',
        'stock',
        'subcategoria_id',
        'estado'
    ];

    public function sub_categoria()
    {
        return $this->belongsTo('App\SubCategoria');
    }
    public function linea_compra()
    {
        return $this->hasMany('App\Linea_Compra');
    }
    public function linea_venta()
    {
        return $this->hasMany('App\Linea_Venta');
    }
    public function linea_gasto()
    {
        return $this->hasMany('App\Linea_Gasto');
    }
    public function pool()
    {
        return $this->hasMany('App\Pool');
    }
}
