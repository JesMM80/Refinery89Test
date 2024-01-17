@extends('layouts.principal')

@section('titulo')
    List of departments
@endsection

@section('contenido')
   
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- @forelse ($vacantes as $vacante) --}}
                    <div class="p-4 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="space-y-3">
                            {{-- <a href="{{ route('vacantes.show',$vacante->id) }}" class="text-xl font-bold hover:text-gray-300 "> --}}
                            <a href="#" class="text-xl font-bold hover:text-gray-300 ">
                                {{-- {{$vacante->titulo}} --}}ID: 1
                            </a>
                            <p class="text-sm text-gray-600 font-bold">
                                {{-- {{$vacante->empresa}} --}}Name
                            </p>
                            <p class="text-sm text-gray-500">
                                {{-- Último día: {{$vacante->ultimo_dia->format('d/m/Y')}} --}}Informática
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                            <a href="{{ route('departments.show', 1)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                View
                            </a> 

                            <button  class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                Delete
                            </button>
                        </div>
                    </div>
                    
                {{-- Se itera sobre los resultados del array y en caso de que no haya nada se muestra el mensaje. De esta forma es más corto
                que añadir un if y luego un foreach. --}}
                {{-- @empty --}}
                    <p class="p-3 text-center text-sm text-gray-600">Departments haven't been created yet.</p>
                {{-- @endforelse --}}
            </div>
        
            <div class="mt-10">
                {{-- {{ $vacantes->links() }} --}}
            </div>
        </div>
    </div>
@endsection