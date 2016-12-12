<?php

namespace Market\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Market\Http\Controllers\Controller;
use Market\Models\Product\Producto;
use Market\Models\Product\Marca;

//mensaje flash
use Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //creamos el array de productos a partir del modelo
      $productos = Producto::
          select('productos.id','productos.nombre as producto','precio','marcas.nombre as marca')->join('marcas','marcas.id','=','productos.marca_id')->paginate(5);
          //->get(); cambio el get por el paginate;
      return View('productos/index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //esto primero es para el desplegable
        $marcas = Marca::pluck('nombre','id')->prepend('Selecciona la Marca');
        return view('productos.create')->with('marcas',$marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //esta parte es para guardar un producto nuevo
        Producto::create($request->all());
        //cuando guarde un producto, envie un mensaje
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('productos.index');
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
        $productos = Producto::FindOrFail($id);
        return view('productos.show')->with('productos',$productos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //desplegable
      $marcas = Marca::pluck('nombre','id')->prepend('Selecciona la Marca');
      $productos = Producto::FindOrFail($id);

      return view('productos.edit', array('productos'=>$productos,'marcas'=>$marcas));
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
      $productos = Producto::FindOrFail($id);
      $input = $request->all();
      $productos->fill($input)->save();
      Session::flash('update','Se ha actualizado correctamente');
      return redirect()->route('productos.index');
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
          $productos = Producto::FindOrFail($id);
          $productos->delete();
          Session::flash('delete','Se ha eliminado correctamente');
          return redirect()->route('productos.index');
    }
}
