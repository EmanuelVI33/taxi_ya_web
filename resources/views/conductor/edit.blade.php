@extends('layouts.app')
@section('contenido')

<h3 class="text-center font-bold text-2xl py-3">
    Editar Conductor {{ $conductor->nombre . ' ' . $conductor->apellido }}
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('conductor.update', $conductor->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $conductor->cliente->user->nombre }}" />
        </div>

        {{-- Apellido --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{ $conductor->cliente->user->apellido }}"  />
        </div>

        {{-- Carnet de Identidad --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="ci" :value="__('Carnet de Identidad')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="number" name="ci" value="{{ $conductor->ci }}" />
        </div>

        {{-- Telefono --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="telefono" :value="__('Teléfono')" />

            <x-text-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" value="{{ $conductor->cliente->user->telefono }}" />
        </div>

        <div class="p-4 flex gap-1 bg-slate-100 mt-2">
            <img src="{{asset('storage'.'/'.$conductor->fotoLicencia)}}" alt="" class="container w-200 h-200">
            <img src="{{asset('storage'.'/'.$conductor->fotoTIC)}}" alt="" class="container w-200 h-200">
            <img src="{{asset('storage'.'/'.$conductor->fotoAntecedente)}}" alt="" class="container w-200 h-200">
        </div>

        {{-- <div class="p-4 flex gap-1 bg-slate-100">
            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de licencia')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="fotoLicencia" value="" />
            </div>

            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de TIC')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="fotoTIC" value="" />
            </div>
            
            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de antecedentes')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="fotoAntecedentes" value="" />
            </div>
        </div> --}}

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Actualizar Datos') }}
        </x-primary-button>

    </form>   

@endsection