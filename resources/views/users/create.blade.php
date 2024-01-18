@extends('layouts.principal')

@section('titulo')
    Create a user
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
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" id="name" placeholder="Name of the user" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror"
                        value="{{ old('name') }}" 
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="text" 
                        name="email" id="email" placeholder="email of the user" 
                        class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"
                        value="{{ old('email') }}" 
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu password de registro" class="border p-3 w-full rounded-lg 
                        @error('password')
                        border-red-500
                        @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center "> {{ $message }} </p>
                    @enderror
                </div>    

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <!-- En laravel hay que poner _confirmation en este caso, es una convención -->
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repetir password de registro" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Create" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection