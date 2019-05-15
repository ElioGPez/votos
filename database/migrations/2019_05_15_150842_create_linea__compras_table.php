<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea__compras', function (Blueprint $table) {
            $table->increments('id');
            $table->double('subtotal');
            $table->double('precio');
            $table->integer('cantidad');
	        $table->date('fechafin');
	        $table->integer('compra_id')->unsigned();
	        $table->foreign('compra_id')->references('id')->on('compras')->ondelete('cascade');
            $table->integer('producto_id')->unsigned();
	        $table->foreign('producto_id')->references('id')->on('productos')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea__compras');
    }
}
