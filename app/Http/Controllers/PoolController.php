<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pool;
use App\Producto;
use Carbon\Carbon;
use DB;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesa1 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','1')->get();
        $mesa2 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','2')->get();
        $mesa3 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','3')->get();

        //$compras = Compra::with(['linea_compra','linea_compra.producto'])->whereBetween('fecha', array($desde, $hasta))->orderBy('id','DESC')->paginate(8);
        $mesas[] = [
            'mesa1' => $mesa1,
            'mesa2' => $mesa2,
            'mesa3' => $mesa3
        ];
    
        return $mesas;
    }

    public function obtenerFichasVendidas($desde,$hasta){
        if($hasta == '-'){
            $mesa1 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','1')->where('fecha', '=', $desde)->count();
            $mesa2 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','2')->where('fecha', '=', $desde)->count();
            $mesa3 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','3')->where('fecha', '=', $desde)->count();
        }else{
            $mesa1 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','1')->whereBetween('fecha', array($desde, $hasta))->get();
            $mesa2 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','2')->whereBetween('fecha', array($desde, $hasta))->get();
            $mesa3 = DB::table('pools')->select(DB::raw('COUNT(monto) as cantidad'), DB::raw('SUM(monto) as suma'))->where('producto_id','=','3')->whereBetween('fecha', array($desde, $hasta))->get();
        }
        $mesas[] = [
            'mesa1' => $mesa1,
            'mesa2' => $mesa2,
            'mesa3' => $mesa3
        ];
    
        return $mesas;
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
        $pool = new Pool;
        //Establecemos la fecha actual
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $pool->fecha = $mytime->toDateTimeString();
        $mesa=DB::table('productos')->where('producto','=',$request->mesa)->get();
        //dd($mesa[0]->precio);
        $pool->monto = $mesa[0]->precio;
        $pool->producto_id = $mesa[0]->id;

        $pool->save();
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
