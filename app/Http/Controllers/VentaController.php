<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Venta;
use App\Linea_Venta;
use Carbon\Carbon;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $venta = new Venta;
        $venta->total = $request->total;
        //Establecemos la fecha actual
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $venta->fecha = $mytime->toDateTimeString();
        $venta->estado = 'PAGADA';
        $venta->cliente_id = $request->cliente_id;
        $venta->save();
        //dd($request->linea_venta);
        $linea_venta = $request->linea_venta;
        foreach ($linea_venta as $linea) {
        //dd($linea);

          $linea_v = new Linea_Venta();
          $linea_v->venta_id=$venta->id;
          $linea_v->producto_id=$linea["id"];
         // dd($linea["cantidad"]);
          $linea_v->cantidad=$linea["cantidad"];
          $linea_v->subtotal=$linea["subtotal"];
          $linea_v->precio=$linea["precio"];
          $linea_v->save();
        }

        return $venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
