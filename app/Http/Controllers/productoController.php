<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=producto::orderBy('id','DESC')->paginate(3);
        return view('productos.index')->with('productos', $productos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'sku'=>'required', 'nombre'=>'required', 'descripcion'=>'required', 'id_categoria'=>'required', 'stock'=>'required', 'precio'=>'required']);
        producto::create($request->all());
        $productos=producto::orderBy('id','DESC')->paginate(3);
        return view('productos.index',compact('productos'));
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
          $producto=producto::find($id);
        return  view('productos.show',compact('producto'));
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
         $producto=producto::find($id);
        return view('productos.edit',compact('producto'));
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
          $this->validate($request,[ 'sku'=>'required', 'nombre'=>'required', 'descripcion'=>'required', 'id_categoria'=>'required', 'stock'=>'required', 'precio'=>'required', 
            'imagen'=>'required']);
        producto::find($id)->update($request->all());
        return redirect()->route('productos.index')->with('success','Registro actualizado satisfactoriamente');

       
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
        producto::find($id)->delete();
        return redirect()->route('productos.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
