<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
	protected $table = "pools";
    protected $primaryKey ="id";

	protected $filable = [
        'monto',
        'fecha',
        'producto_id'
    ];
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
