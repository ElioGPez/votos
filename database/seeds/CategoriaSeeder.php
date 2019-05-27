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
        Categoria::create([
          'nombre' => 'bebida',
          'descripcion' => 'Abarca las bebidas que se venden en el local'
        ]);
        

    }
}
