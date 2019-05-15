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
        'categoria_id'
    ];
}
