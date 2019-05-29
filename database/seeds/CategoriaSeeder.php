<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categorias')->truncate();
        // DB::table('sub_categorias')->truncate();
        // DB::table('productos')->truncate();

        Categoria::create([
          'nombre' => 'alimento',
          'descripcion' => 'Abarca las comidas que se venden en el local'
        ]);
        DB::table('categorias')->insert([  
            'nombre' => 'bebida',
            'descripcion' => 'Abarca las bebidas que se venden en el local'
        ]);
        DB::table('sub_categorias')->insert([  
            'nombre' => 'sandwich',
            'descripcion' => 'Abarca los diferentes sandwich que se venden en el local',
            'categoria_id' => '1'
        ]);
        DB::table('sub_categorias')->insert([  
            'nombre' => 'pizza',
            'descripcion' => 'Abarca las diferentes pizzas que se venden en el local',
            'categoria_id' => '1'
        ]);
        DB::table('sub_categorias')->insert([  
            'nombre' => 'al plato',
            'descripcion' => 'Abarca los diferentes alimentos "al plato" que se venden en el local',
            'categoria_id' => '1'
        ]);
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
        DB::table('clientes')->insert([  
            'nombre' => 'cliente'
        ]);
        DB::table('clientes')->insert([  
            'nombre' => 'Franco',
            'telefono' => '0381156988547',
            'direccion' => 'Laprida 1245'
        ]); 
    }
}
