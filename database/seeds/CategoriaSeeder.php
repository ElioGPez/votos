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
          'nombre' => 'Alimento',
          'descripcion' => 'Abarca las comidas que se venden en el local'
        ]);
        DB::table('categorias')->insert([  
            'nombre' => 'Bebida',
            'descripcion' => 'Abarca las bebidas que se venden en el local'
        ]);
        DB::table('categorias')->insert([  
            'nombre' => 'Insumo',
            'descripcion' => 'Abarca todos los insumos utilizados en el local'
        ]);
        DB::table('categorias')->insert([  
            'nombre' => 'Gasto',
            'descripcion' => 'Abarca los gastos fijos y variables'
        ]);
        DB::table('categorias')->insert([  
            'nombre' => 'Pool',
            'descripcion' => 'Abarca todo sobre el Pool'
        ]);
    }
}
