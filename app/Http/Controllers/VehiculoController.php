<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**                                     //By Julico
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Vehiculo::get();
        // dd($carros);
        return view('VistaVehiculos.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('VistaVehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $user = new Vehiculo();
        $user->placa = $r->placa;
        $user->marca = $r->marca;
        $user->modelo = $r->modelo;
        $user->año = $r->anio;
        $user->save();

        return redirect()->route('vehiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = Vehiculo::where('id', $id)->first();
        return view('VistaVehiculos.edit', compact('carro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Vehiculo $v)
    {
        // dd($v);
        $v->id = $r->id;
        $v->placa = $r->placa;
        $v->marca =  $r->marca;
        $v->modelo = $r->modelo;
        $v->año =  $r->anio;
        $v->save();

        return redirect()->route('vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $Vehiculo)
    {
        // dd($Vehiculo);
        $Vehiculo->delete();
        return redirect()->route('vehiculo.index');
    }
}
