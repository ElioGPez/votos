<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pool;
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
            $mesa1 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','1')->where('fecha', '=', $desde)->count();
            $mesa2 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','2')->where('fecha', '=', $desde)->count();
            $mesa3 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','3')->where('fecha', '=', $desde)->count();

            $ventas = Venta::with(['cliente','linea_venta','linea_venta.producto'])->where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
            $compras = Compra::with(['linea_compra','linea_compra.producto'])->where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
            $gastos = Gasto::with(['linea_gasto','linea_gasto.producto'])->where('fecha', '=', $desde)->orderBy('id','DESC')->paginate(8);
        }else{
            $mesa1 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','1')->whereBetween('fecha', array($desde, $hasta))->get();
            $mesa2 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','2')->whereBetween('fecha', array($desde, $hasta))->get();
            $mesa3 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','3')->whereBetween('fecha', array($desde, $hasta))->get();
        
            $ventas = Venta::with(['cliente','linea_venta','linea_venta.producto'])->whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
            $compras = Compra::with(['linea_compra','linea_compra.producto'])->whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
            $gastos = Gasto::with(['linea_gasto','linea_gasto.producto'])->whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
   
        }
        if(gettype($mesa1) == 'integer'){
                $mesa1 = [[
                    'cantidad' => 0,
                    'suma' => 0
                ]];
        }
        if(gettype($mesa2) == 'integer'){
            $mesa2 = [[
                'cantidad' => 0,
                'suma' => 0
            ]];
        }
        if(gettype($mesa3) == 'integer'){
            $mesa3 = [[
                'cantidad' => 0,
                'suma' => 0
            ]];
        }

        $mesas[] = [
            'mesa1' => $mesa1,
            'mesa2' => $mesa2,
            'mesa3' => $mesa3
        ];


        $informe2[] = [
            'ventas' => $ventas,
            'compras' => $compras,
            'gastos' => $gastos,
            'mesas' => $mesas
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
        $venta = Venta::findOrFail($id);
        //dd($request->get('estado'));
        $venta->estado = $request->get('estado');
        
        $venta->update();

        return $venta;
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
