<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('producto','ASC')->paginate(8);
        return $productos;
    }
    public function obtenerProductos($filtro)
    {
        //$productos = Producto::orderBy('id','DESC')->paginate(8);
        if($filtro != '0'){
            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.*')
            ->where('c.id','=',$filtro)
            ->orderBy('p.producto','ASC')
            ->paginate(8)
            ;

        }else{
            $productos = Producto::orderBy('producto','ASC')->paginate(8);
        }
        return $productos;
    }
    public function obtenerInsumos()
    {

            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.*')
            ->where('c.id','=','3')
            ->orderBy('p.producto','ASC')
            ->paginate(8)
            ;
        return $productos;
    }
    public function obtenerInsumosAll()
    {

            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.*')
            ->where('c.id','=','3')
            ->orderBy('p.producto','ASC')
            ;
        return $productos->get();
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
        $producto = new Producto;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock ='0';
        $producto->subcategoria_id = $request->subcategoria_id;

        // $file=Input::file($request->imagen);
        //$file->move(public_path().'/imagenes/productos',$file->name);

        //Pasos para la decodificacion de la imagen recibida base64
        $exploded = explode(',',$request->imagen);
        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        }else{
            $extension = 'png';
        }
        $fileName = str_random().'.'.$extension;
        $path = public_path().'/images/'.$fileName;
        file_put_contents($path,$decoded);
        $producto->imagen=$fileName;
        //$producto->imagen='';
        $producto->save();
    }

    public function guardarInsumo(Request $request)
    {
        $producto = new Producto;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock =$request->stock;
        $producto->subcategoria_id = '5';

        // $file=Input::file($request->imagen);
        //$file->move(public_path().'/imagenes/productos',$file->name);

        //Pasos para la decodificacion de la imagen recibida base64
        $exploded = explode(',',$request->imagen);
        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        }else{
            $extension = 'png';
        }
        $fileName = str_random().'.'.$extension;
        $path = public_path().'/images/'.$fileName;
        file_put_contents($path,$decoded);
        $producto->imagen=$fileName;
        //$producto->imagen='';
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd("pasa pero no pasa");
        $productos=DB::table('productos')->where('subcategoria_id','=',$id)->get();
        return $productos;
    }

    public function getProducto($id){

        $producto = Producto::findOrFail($id);
        return $producto;
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
        $producto = Producto::findOrFail($id);

        $producto->subcategoria_id = $request->get('subcategoria_id');
        $producto->producto = $request->get('producto');
        $producto->stock = $request->get('stock');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');

        //dd($producto->imagen);
        if ($producto->imagen != $request->get('imagen')) {
            $exploded = explode(',',$request->imagen);
            $decoded = base64_decode($exploded[1]);
    
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }else{
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;
            $path = public_path().'/images/'.$fileName;
            file_put_contents($path,$decoded);
            $producto->imagen=$fileName;
        }
        $producto->update();

        return $producto;
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
