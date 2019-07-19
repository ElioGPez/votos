<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto');
            $table->string('descripcion')->nullable();
            $table->double('precio');
	        $table->string('imagen');
            $table->integer('stock')->nullable();
            $table->string('estado')->default('activo');
	        $table->integer('subcategoria_id')->unsigned();
	        $table->foreign('subcategoria_id')->references('id')->on('sub_categorias')->ondelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
