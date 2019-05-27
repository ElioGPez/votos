<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->insert([
            'producto' => 'Sandwich Comun',
            'descripcion' => 'Con pan Comun',
            'precio' => '110',
            'imagen' => '/images/hamburguesa.jpg',
            'subcategoria_id' => '1'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Sandwich Especial',
            'descripcion' => 'Con pan especial',
            'precio' => '130',
            'imagen' => '/images/hamburguesa.jpg',
            'subcategoria_id' => '1'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Sandwich Especial',
            'descripcion' => 'Con pan especial',
            'precio' => '130',
            'imagen' => '/images/hamburguesa.jpg',
            'subcategoria_id' => '1'
        ]);
    }
}
