@extends('layouts.principal')

@section('titulo')
    Department's details
@endsection

@section('contenido')
   
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('departments.update',$department) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" id="name" placeholder="Name of the department" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror"
                        value="{{ old('name', $department->name) }}" 
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                

                <input type="submit" value="Update" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection