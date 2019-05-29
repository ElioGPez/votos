<?php

use Illuminate\Database\Seeder;
use App\SubCategoria;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SubCategoria::create([
        'nombre' => 'sandwich',
        'descripcion' => 'Abarca los diferentes sandwich que se venden en el local',
        'categoria_id' => 1
      ]);

      SubCategoria::create([
        'nombre' => 'pizza',
        'descripcion' => 'Abarca las diferentes pizzas que se venden en el local',
        'categoria_id' => 1
      ]);

      SubCategoria::create([
        'nombre' => 'al plato',
        'descripcion' => 'Abarca los diferentes alimentos "al plato" que se venden en el local',
        'categoria_id' => 1
      ]);


    }
}
