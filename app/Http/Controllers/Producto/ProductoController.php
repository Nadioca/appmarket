<?php

namespace Market\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Market\Http\Controllers\Controller;

//Models
use Market\Models\Product\Producto;
use Market\Models\Product\Marca;

//Requests Controllers
use Market\Http\Requests\Productos\ProductosCreateRequest;
use Market\Http\Requests\Productos\ProductosUpdateRequest;

//mensaje flash
use Session;

class ProductoController extends Controller
{

    public function index()
    {
      //creamos el array de productos a partir del modelo
      $productos = Producto::
          select('productos.id','productos.nombre as producto','precio','marcas.nombre as marca')->join('marcas','marcas.id','=','productos.marca_id')->paginate(5);
          //->get(); cambio el get por el paginate;
      return View('productos/index')->with('productos',$productos);
    }

    public function create()
    {
        //esto primero es para el desplegable
        $marcas = Marca::pluck('nombre','id')->prepend('Selecciona la Marca');
        return view('productos.create')->with('marcas',$marcas);
    }

    //al guardar ahora va a usar el controlador
    public function store(ProductosCreateRequest $request)
    {
        //esta parte es para guardar un producto nuevo
        Producto::create($request->all());
        //cuando guarde un producto, envie un mensaje
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('productos.index');
    }


    public function show($id)
    {
        //
        $productos = Producto::FindOrFail($id);
        return view('productos.show')->with('productos',$productos);
    }


    public function edit($id)
    {
      //desplegable
      $marcas = Marca::pluck('nombre','id')->prepend('Selecciona la Marca');
      $productos = Producto::FindOrFail($id);

      return view('productos.edit', array('productos'=>$productos,'marcas'=>$marcas));
    }

    public function update(Request $request, $id)
    {
      //
      $productos = Producto::FindOrFail($id);
      $input = $request->all();
      $productos->fill($input)->save();
      Session::flash('update','Se ha actualizado correctamente');
      return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        //
          $productos = Producto::FindOrFail($id);
          $productos->delete();
          Session::flash('delete','Se ha eliminado correctamente');
          return redirect()->route('productos.index');
    }
}
