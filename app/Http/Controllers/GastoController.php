<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;
use App\Linea_Gasto;
use Carbon\Carbon;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::orderBy('id','DESC')->paginate(8);
        return $gastos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gasto = new Gasto;
        $gasto->total = $request->total;
        //Establecemos la fecha actual
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $gasto->fecha = $mytime->toDateTimeString();
        $gasto->estado = 'PAGADA'; 

        $gasto->save();

        $linea_gasto = $request->linea_compra;
        foreach ($linea_gasto as $linea) {

          $linea_c = new Linea_Gasto();
          $linea_c->gasto_id=$gasto->id;
          $linea_c->producto_id=$linea["id"];
          $linea_c->cantidad=$linea["cantidad"];
          $linea_c->subtotal=$linea["subtotal"];
          $linea_c->costo=$linea["precio"];
          $linea_c->save();

            /*$producto = Producto::findOrFail($linea["producto"]["id"]);
            $producto->stock += $linea["cantidad"];
            $producto->save();*/
        }

        return $gasto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasto = Gasto::with(['linea_gasto','linea_gasto.producto'])->where('id',$id)->get();
        return $gasto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
