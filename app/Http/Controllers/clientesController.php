<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;

class clientesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=clientes::orderBy('id','DESC')->paginate(3);
        return view('clientes.index',compact('clientes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required', 'correo'=>'required', 'direccion'=>'required', 'precio'=>'required']);
        clientes::create($request->all());
        return redirect()->route('clientes.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $clientes=clientes::find($id);
        return  view('clientes.show',compact('clientes'));
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
         $clientes=clientes::find($id);
        return view('clientes.edit',compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
         $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required', 'correo'=>'required', 'direccion'=>'required', 'precio'=>'required']);
        clientes::find($id)->update($request->all());
        return redirect()->route('clientes.index')->with('success','Registro actualizado satisfactoriamente');
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
         clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success','Registro eliminado satisfactoriamente');
    
    }
}
