<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
