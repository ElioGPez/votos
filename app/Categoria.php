<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = "categorias";
    protected $primaryKey ="id";

	protected $filable = ['nombre','descripcion'];

	public function sub_categoria()
    {
        return $this->hasMany('App\Subcategoria');
    }
}
