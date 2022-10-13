<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['conductors'] = Conductor::paginate(8);
        return view('conductor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conductor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','confirmed',Password::defaults()],
        ]);

        $fileData_fA = '';

        if($request->hasFile('fotoAntecedente') and ($request->fotoAntecedente->extension() == 'png' or $request->fotoAntecedente->extension() == 'jpg' or $request->fotoAntecedente->extension() == 'bmp')){
            $fileData_fA = $request->file('fotoAntecedente')->store('uploads','public');
        }

        $fileData_fL = '';

        if($request->hasFile('fotoLicencia') and ($request->fotoLicencia->extension() == 'png' or $request->fotoLicencia->extension() == 'jpg' or $request->fotoLicencia->extension() == 'bmp')){
            $fileData_fL = $request->file('fotoLicencia')->store('uploads','public');
        }

        $fileData_fTIC = '';

        if($request->hasFile('fotoTIC') and ($request->fotoTIC->extension() == 'png' or $request->fotoTIC->extension() == 'jpg' or $request->fotoTIC->extension() == 'bmp')){
            $fileData_fTIC = $request->file('fotoTIC')->store('uploads','public');
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password)
        ]);

        $cliente = Cliente::create([
            'user_id' => $user->id,
        ]);

        Conductor::create([
            'cliente_id' => $cliente->id,
            'ci' => $request->ci,
            'ocupado' => 0,
            'fotoAntecedente' => $fileData_fA,
            'fotoLicencia' => $fileData_fL,
            'fotoTIC' => $fileData_fTIC,
        ]);

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
