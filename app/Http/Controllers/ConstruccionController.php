<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyente;
use App\Impuesto;
use App\Construccion;
use App\Http\Requests\ConstruccionRequest;

class ConstruccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $construcciones = Construccion::all();
        return view('construcciones.index',compact('construcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contribuyentes = Contribuyente::all();
        $impuestos = Impuesto::all();
        $construcciones = Construccion::all();
        return view('construcciones.create',compact('contribuyentes','impuestos','construcciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Construccion::create($request->All());
        bitacora('Registro una construción');
        return redirect('construcciones')->with('mensaje', 'Pago registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $construcciones = Construccion::findorFail($id);
        return view('construcciones.show',compact('construcciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $construcciones = Construccion::find($id);
        return view('construcciones.edit',compact('construcciones'));
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
