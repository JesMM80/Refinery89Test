@extends('layouts.principal')

@section('titulo')
    Hierarchy of departments
@endsection

@section('contenido')
   
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @forelse ($departments as $department)
                    <div class="p-4 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="space-y-3">
                            <a href="#" class="text-sm font-bold hover:text-gray-300 ">
                                ID: {{$department->id}}
                            </a>
                            <p class="text-sm text-gray-600 font-bold">
                                Name
                            </p>
                            <p class="text-sm text-gray-500">
                                {{$department->name}}
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                            <a href="{{ route('departments.show', $department->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                View / Edit
                            </a> 
                            <form action="{{ route('departments.destroy', $department->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">Departments haven't been created yet.</p>
                @endforelse
            </div>
        
            <div class="mt-10">
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection