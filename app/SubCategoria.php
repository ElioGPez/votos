<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
	protected $table = "sub_categorias";
    protected $primaryKey ="id";

	protected $filable = ['nombre','descripcion'];

	public function producto()
    {
        return $this->hasMany('App\Producto');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}