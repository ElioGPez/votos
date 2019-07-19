<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Producto;
use App\SubCategoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=DB::table('productos as p')
        ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
        ->join('categorias as c','sc.categoria_id','=','c.id')
        ->select('p.*')
        ->where('c.id','>','0')
        ->where('c.id','<','3')
        ->where('p.estado','=','activo')
        ->paginate(8);
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
            ->where('p.estado','=','activo')
            ->orderBy('p.producto','ASC')
            ->paginate(8)
            ;
        }else{

            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.*')
            ->where('c.id','>','0')
            ->where('c.id','<','3')
            ->where('p.estado','=','activo')
            ->paginate(8);
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
            ->where('p.estado','=','activo')
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
            ->where('p.estado','=','activo')
            ->orderBy('p.producto','ASC')
            ;
        return $productos->get();
    }

    public function obtenerGastos()
    {
            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('sc.nombre','p.*')
            ->where('c.id','=','4')
            ->where('p.estado','=','activo')
            //->orderBy('p.producto','ASC')
            ->paginate(4)
            ;
        return $productos;
    }
    public function obtenerGastosAll()
    {

            $productos=DB::table('productos as p')
            ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.*')
            ->where('c.id','=','4')
            ->where('p.estado','=','activo')
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
        $producto->stock = $request->stock;
        $producto->subcategoria_id = $request->subcategoria_id;

        // $file=Input::file($request->imagen);
        //$file->move(public_path().'/imagenes/productos',$file->name);

        //Pasos para la decodificacion de la imagen recibida base64
        if($request->imagen != ''){
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
        }else{
            $subcategoria = SubCategoria::findOrFail($producto->subcategoria_id);
            if($subcategoria->nombre == 'Sandwich'){
                $producto->imagen = 'sandwich.png';
            }else
            if($subcategoria->nombre == 'Pizzas'){
                $producto->imagen = 'pizzas.png';
            }
            if($subcategoria->nombre == 'Al plato'){
                $producto->imagen = 'al-plato.png';
            }else
            {
                $producto->imagen = 'bebida.jpg';
            }
        }

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
        if($request->imagen != ''){
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
        }else{
                $producto->imagen = 'insumo.png';
        }
        //$producto->imagen='';
        $producto->save();
    }
    public function guardarGasto(Request $request)
    {
        $producto = new Producto;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        if($producto->nombre == 'Gasto Fijo'){
            $producto->subcategoria_id = '6';
        }else{
            $producto->subcategoria_id = '7';
        }

        // $file=Input::file($request->imagen);
        //$file->move(public_path().'/imagenes/productos',$file->name);

        //Pasos para la decodificacion de la imagen recibida base64
        if($request->imagen != ''){
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
        }else{
                $producto->imagen = 'gasto.png';
        }
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
        $productos=DB::table('productos as p')
        ->where('p.estado','=','activo')
        ->where('subcategoria_id','=',$id)->get();
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
        $producto = Producto::findOrFail($id);
        $producto->estado = 'inactivo';
        $producto->update();

        return $producto;
    }
}
