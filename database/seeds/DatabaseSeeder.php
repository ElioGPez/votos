<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');//Para Activar
        DB::table('productos')->truncate();
        DB::table('clientes')->truncate();
        DB::table('sub_categorias')->truncate();
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');//Para Desactivar
        $this->call(CategoriaSeeder::class);
        $this->call(SubcategoriaSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ClientesSeeder::class);

    }
}
