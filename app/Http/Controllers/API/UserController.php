<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                ->select('nombre', 'apellido', 'email', 'telefono')
                ->orderBy('apellido')
                ->paginate(10);

        return response($users, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        $response = [
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'telefono' => $user->telefono,
            ],
            'image' => $user->cliente->foto,
        ];

        return response($response, 200);
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
        $request->validate([
            'nombre' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'apellido' => ['string', 'max:255'],
            'telefono' => ['max:10'],
            'foto' => ['image', 'mimes:jpg,jpeg,png,gif,bmp,svg'],
        ]);
        
        $user = User::find($id);

        if ($password = $request->password) {  // Envio contraseña
            if (!Hash::check($password, $user->password)) {
                return response([
                    'massage' => 'Contraseña Incorecta'
                ], 401);
            }
            
            $user->password = Hash::make($request->new_password);
        }

        $cliente = $user->cliente;
        $fotoCliente = $cliente->foto;

        // Verificar si existe imagen
        if ($imagen = $request->file('foto')) {
            $rutaGuardarImagen = 'cliente-fotos/';
            $imageUser = Str::uuid() . "." . $imagen->getClientOriginalExtension();
            if ($fotoCliente != null) { // Eliminar foto anterior
                Storage::delete('cliente-fotos/' . $fotoCliente);
            }
            $imagen->move($rutaGuardarImagen, $imageUser);
        }

        if ($request->nombre != null) 
            $user->nombre = $request['nombre'];
        if ($request->apellido != null) 
            $user->apellido = $request['apellido'];    
        if ($request->telefono != null) 
            $user->telefono = $request['telefono'];
        if ($request->email != null) 
            $user->email = $request['email']; 
            
        $user->update();

        $cliente->foto = $imageUser ?? '';
        $cliente->update();
        
        $response = [
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'telefono' => $user->telefono,
            ],
            'image' => $user->cliente->foto,
        ];
        
        return response($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function getDetail() {
        $user = auth()->user();

        $response = [
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'telefono' => $user->telefono,
            ],
            'role' => 'cliente',
            'image' => $user->cliente->foto,
        ];

        return response($response, 200);    
    }

}
