<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Venta;
use App\Compra;
use App\Gasto;
use App\Linea_Venta;
use App\Producto;
use Carbon\Carbon;
use \stdClass;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::orderBy('id','DESC')->paginate(8);
        return $ventas;

    }
    public function buscarPorFecha($desde,$hasta)
    {
        $ventas = Venta::whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
        return $ventas;
    }
    public function obtenerInforme($desde,$hasta){
        if($hasta == '-'){
            $ventas = Venta::where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
            //dd($ventas->all());

            $compras = Compra::where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
            $gastos = Gasto::where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
        }else{
            $ventas = Venta::whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
            $compras = Compra::whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
            $gastos = Gasto::whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
   
        }
        $informe = new stdClass();
        $informe->ventas = $ventas;
        $informe->compras = $compras;
        $informe->gastos = $gastos;

        $informe2[] = [
            'ventas' => $ventas,
            'compras' => $compras,
            'gastos' => $gastos
        ];
        return $informe2;
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
        $venta->cliente_id = $request->cliente_id;
        if($venta->cliente_id == '1'){
            $venta->estado = 'PAGADA'; 
        }else{
            $venta->estado = 'IMPAGA'; 
        }
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

          if($linea["categoria_id"] == '2'){
            $producto = Producto::findOrFail($linea["producto"]["id"]);
            $producto->stock -= $linea["cantidad"];
            $producto->save();
          }
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

        $venta = Venta::with(['cliente','linea_venta','linea_venta.producto'])->where('id',$id)->get();
        return $venta;
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
