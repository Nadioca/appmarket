<?php

namespace Market\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Market\Http\Controllers\Controller;
use Market\Models\Product\Producto;
use Market\Models\Product\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //crear el objeto marcas a partir del modelo
          $marcas = Marca::all();
          //retornar vista
          return view('marcas/index')->with('marcas', $marcas);
    }

    public function create()
    {
        //
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        //
        Marca::create($request->all());
        return redirect()->route('marcas.index');
    }

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
        $marcas = Marca::FindOrFail($id);
        return view('marcas.edit', array('marcas'=>$marcas));
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
        $marcas = Marca::FindOrFail($id);
        $input = $request->all();
        $marcas->fill($input)->save();

        return redirect()->route('marcas.index');
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
