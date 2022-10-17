@extends('layouts.app')

@section('contenido')
    <div class="mt-4 mx-4">
        <div class="md:col-span-2 xl:col-span-3 text-center font-semibold">
            <p class="text-lg">Lista de Automóviles</p>
        </div>
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <div class="relative w-full max-w-full flex pb-2 flex-1 text-right">
                                <a href="{{ Route('vehiculo.create') }}"
                                    class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    Registrar un Vehiculo</a>

                                <a href="{{ Route('vehiculo.pdf') }}"
                                    class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Imprimir
                                </a>
                            </div>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Placa</th>
                                <th class="px-4 py-3">Marca</th>
                                <th class="px-4 py-3">Modelo</th>
                                <th class="px-4 py-3">Año</th>
                                <th class="px-4 py-3">Propietario</th>
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($carros as $cars)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <p class="font-semibold">{{ $cars->id }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm uppercase">{{ $cars->placa }}</td>
                                    <td class="px-4 py-3 text-xs uppercase">{{ $cars->marca }}</td>
                                    <td class="px-4 py-3 text-xs uppercase">{{ $cars->modelo }}</td>
                                    <td class="px-4 py-3 text-xs ">{{ $cars->año }}</td>
                                    <td class="px-4 py-3 text-xs uppercase">{{ $cars->propietario }}</td>
                                    <td class="px-4 py-3 text-xs">

                                        <button type="button"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            <a href="{{ Route('vehiculo.edit', $cars->id) }}">
                                                EDITAR
                                            </a></button>

                                        <button type="button"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                            <form action="{{ Route('vehiculo.destroy', $cars->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- @dd($cars->id); --}}
                                                <input type="number" value="{{ $cars->id }}" class="hidden">
                                                <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')">
                                            </form>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                    <span
                                        class="px-2 md-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        No hay Vehiculos cargados en la BD.
                                    </span>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
@endsection
