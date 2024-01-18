@extends('layouts.principal')

@section('titulo')
    Assign user to department
@endsection

@section('contenido')
   
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            @if (session('message'))
                <div class="p-2 border border-green-600 bg-green-300 font-bold mt-2 mb-2 text-center">
                    <p class="mt-1 text-black text-sm leading-relaxed">
                        {{ session('message') }}
                    </p>
                </div>
            @endif
            @if (session('error'))
                <div class="p-2 border border-red-600 bg-red-300 font-bold mt-2 mb-2 text-center">
                    <p class="mt-1 text-black text-sm leading-relaxed">
                        {{ session('error') }}
                    </p>
                </div>
            @endif

            <form action="{{ route('departments.assignUserStore',$department) }}" method="POST">
                @csrf
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
                   
                </div>
           
                
                <div class="mb-5 grid grid-cols-2 gap-4">
                    <div>
                        <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                            Assign user
                        </label>
                        <select name="user" class="border p-3 w-full rounded-lg">
                            <option>-- Select --</option>
                            @forelse ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>  
                            @empty          
                                <option value="0">There aren't users created!</option>  
                            @endforelse
                        </select>
                    </div>
                    <div>
                        <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold text-center">
                            Assign user
                        </label>
                        <button class="bg-green-400 hover:bg-green-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
                            Assign
                        </button>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection