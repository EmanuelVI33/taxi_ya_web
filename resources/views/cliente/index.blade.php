@extends('layouts.app')

@section('contenido')
    <h3 class="text-center font-bold text-2xl py-3">
        Clientes Registrados
    </h3>
    
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Apellido
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Telefono
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($clientes as $cliente)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-1 px-6">
                            {{ $cliente->nombre }}
                        </td>
                        <td class="py-1 px-6">
                            {{ $cliente->apellido }}
                        </td>
                        <td class="py-1 px-6">
                            {{ $cliente->telefono }}
                        </td>
                    </tr>
                @empty
                    <h3 class="text-xl p-2 bg-slate-600 text-white rounded-lg text-center font-bold mb-3">
                        No se ha encontrado resultados
                    </h3>     
                @endforelse
            </tbody>
        </table>
    </div>
@endsection