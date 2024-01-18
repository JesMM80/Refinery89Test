@extends('layouts.principal')

@section('titulo')
    Hierarchy of departments
@endsection

@section('contenido')
   
<div class="md:flex md:items-center">
    <div class="md:w-1/2 lg:w-full p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">

        <h2 class="text-2xl font-bold mb-4">Departments and Hierarchy</h2>

        @forelse ($departments as $department)
            <div class="mb-4">
                <strong>{{ $department->name }}</strong>
                @if ($department->subdepartments->isNotEmpty())
                    <ul class="ml-4">
                        @foreach ($department->subdepartments as $subdepartment)
                            <li>{{ $subdepartment->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No departments or hierarchy found.</p>
        @endforelse

    </div>
</div>
@endsection