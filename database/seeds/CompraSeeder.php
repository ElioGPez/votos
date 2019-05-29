<?php

use Illuminate\Database\Seeder;
use App\Compra;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Compra::create([
          'total'  => '234',
          'fecha'  => '2019-05-27',
          'estado' => 'impaga',
        ]);
        Compra::create([
          'total'  => '224',
          'fecha'  => '2019-05-27',
          'estado' => 'impaga',
        ]);
        Compra::create([
          'total'  => '134',
          'fecha'  => '2019-05-27',
          'estado' => 'impaga',
        ]);
        Compra::create([
          'total'  => '24',
          'fecha'  => '2019-05-27',
          'estado' => 'impaga',
        ]);
        Compra::create([
          'total'  => '34',
          'fecha'  => '2019-05-27',
          'estado' => 'impaga',
        ]);
    }
}
