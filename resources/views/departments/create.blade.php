@extends('layouts.principal')

@section('titulo')
    Create a department
@endsection

@section('contenido')
   
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="#" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        name="titulo" id="titulo" placeholder="Título" 
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-600 @enderror"
                        value="{{ old('titulo') }}" 
                    />
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                        name="descripcion" id="descripcion" placeholder="descripcion" 
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-600 @enderror"
                    />{{ old('descripcion') }}
                    </textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <select wire:model="salario" id="salario" class="border p-3 w-full rounded-lg">
                        <option>-- Seleccione --</option>
                        {{-- Recogemos el array de la clase crearVacante y mostramos los resultados --}}
                        {{-- @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>            
                        @endforeach --}}
                    </select>
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" id="imagen">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection