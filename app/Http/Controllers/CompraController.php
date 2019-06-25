<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use Carbon\Carbon;
use App\Linea_Compra;
use App\Producto;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::orderBy('id','DESC')->paginate(8);
        return $compra;
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
        $compra = new Compra;
        $compra->total = $request->total;
        //Establecemos la fecha actual
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $compra->fecha = $mytime->toDateTimeString();
        $compra->estado = 'PAGADA'; 

        $compra->save();

        $linea_compra = $request->linea_compra;
        foreach ($linea_compra as $linea) {

          $linea_c = new Linea_Compra();
          $linea_c->compra_id=$compra->id;
          $linea_c->producto_id=$linea["id"];
          $linea_c->cantidad=$linea["cantidad"];
          $linea_c->subtotal=$linea["subtotal"];
          $linea_c->precio=$linea["precio"];
          $linea_c->save();

            $producto = Producto::findOrFail($linea["producto"]["id"]);
            $producto->stock += $linea["cantidad"];
            $producto->save();
        }

        return $compra;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::with(['linea_compra','linea_compra.producto'])->where('id',$id)->get();
        return $compra;
    }
    public function buscarPorFecha($desde,$hasta)
    {
        $compras = Compra::whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);

        return $compras;

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
