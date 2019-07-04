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
      //cat : alimentos
      SubCategoria::create([
        'nombre' => 'Sandwich',
        'descripcion' => 'Abarca los diferentes sandwich que se venden en el local',
        'categoria_id' => 1
      ]);

      SubCategoria::create([
        'nombre' => 'Pizza',
        'descripcion' => 'Abarca las diferentes pizzas que se venden en el local',
        'categoria_id' => 1
      ]);

      SubCategoria::create([
        'nombre' => 'Al plato',
        'descripcion' => 'Abarca los diferentes alimentos "al plato" que se venden en el local',
        'categoria_id' => 1
      ]);
      //cat : bebidas
      SubCategoria::create([
        'nombre' => 'Gaseosa',
        'descripcion' => 'Abarca las bebidas del tipo Gaseosa',
        'categoria_id' => 2
      ]);
      //cat : insumos
      SubCategoria::create([
        'nombre' => 'Pan',
        'descripcion' => 'Abarca los Panes utilizados',
        'categoria_id' => 3
      ]);
      //cat : gastos
      SubCategoria::create([
        'nombre' => 'Gasto Fijo',
        'descripcion' => 'Abarca los Gastos fijos',
        'categoria_id' => 4
      ]);
      SubCategoria::create([
        'nombre' => 'Gasto Variable',
        'descripcion' => 'Abarca los Gastos variables',
        'categoria_id' => 4
      ]);
    }
}
