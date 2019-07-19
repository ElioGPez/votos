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
        //+
        //Pool
        DB::table('productos')->insert([
            'producto' => 'Mesa1',
            'descripcion' => 'Ficha para mesa de Pool 1',
            'precio' => '20',
            'imagen' => '/pool.png',
            'subcategoria_id' => '8'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Mesa2',
            'descripcion' => 'Ficha para mesa de Pool 2',
            'precio' => '20',
            'imagen' => '/pool.png',
            'subcategoria_id' => '8'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Mesa3',
            'descripcion' => 'Ficha para mesa de Pool 3',
            'precio' => '20',
            'imagen' => '/pool.png',
            'subcategoria_id' => '8'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Mesa4',
            'descripcion' => 'Ficha para mesa de Pool 4',
            'precio' => '20',
            'imagen' => '/pool.png',
            'subcategoria_id' => '8'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Mesa5',
            'descripcion' => 'Ficha para mesa de Pool 5',
            'precio' => '20',
            'imagen' => '/pool.png',
            'subcategoria_id' => '8'
        ]);
        //Alimentos
        DB::table('productos')->insert([
            'producto' => 'Sandwich Comun',
            'descripcion' => 'Con pan Comun',
            'precio' => '110',
            'imagen' => '/sandwich-especial.png',
            'subcategoria_id' => '1'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Sandwich Especial',
            'descripcion' => 'Con pan especial',
            'precio' => '130',
            'imagen' => '/sandwich-especial.png',
            'subcategoria_id' => '1'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Pizza',
            'descripcion' => 'pizza comun',
            'precio' => '130',
            'imagen' => '/pizza.png',
            'subcategoria_id' => '2'
        ]);
        DB::table('productos')->insert([
            'producto' => 'Pizza Napolitana',
            'descripcion' => 'pizza napolitana',
            'precio' => '130',
            'imagen' => '/pizza-napolitana.jpg',
            'subcategoria_id' => '2'
        ]);
        //Bebidas
        DB::table('productos')->insert([
            'producto' => 'Coca cola',
            'descripcion' => 'Cocacola de 1 litro y medio',
            'precio' => '130',
            'imagen' => '/coca.png',
            'subcategoria_id' => '4'
        ]);

        //Insumos
        DB::table('productos')->insert([
            'producto' => 'Pan frances',
            'descripcion' => 'Para los Sandwiches',
            'precio' => '130',
            'imagen' => '/pan.jpg',
            'subcategoria_id' => '5'
        ]);
        //Gastos fijos
        DB::table('productos')->insert([
            'producto' => 'Alquiler',
            'descripcion' => 'Pago mensual del alquiler',
            'precio' => '4000',
            'imagen' => 'alquiler.png',
            'subcategoria_id' => '6'
        ]);
        //Gastos variables
        DB::table('productos')->insert([
            'producto' => 'Art. de Limpieza',
            'descripcion' => 'Escobas, detergente, lavandina, etc.',
            'precio' => '0',
            'imagen' => 'gastos_variables.jpg',
            'subcategoria_id' => '7'
        ]);
    }
}
