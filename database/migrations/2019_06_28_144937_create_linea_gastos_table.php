<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('subtotal');
            $table->double('costo');
            $table->integer('cantidad');
	        $table->integer('gasto_id')->unsigned();
	        $table->foreign('gasto_id')->references('id')->on('gastos')->ondelete('cascade');
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
        Schema::dropIfExists('linea_gastos');
    }
}
