<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::select('id', 'name')->paginate(5);

        return view('departments.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());

        return to_route('departments.create')->with('message','Department was successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $id)
    {
        $subdepartments = Department::where('id', '!=', $id->id)
            ->orderBy('name', 'asc')
            ->get(['id', 'name']);

        $users = User::orderBy('name', 'asc')
            ->get(['id', 'name']);


        return view('departments.show',
            [
                'department' => $id,
                'subdepartments' => $subdepartments,
                'users' => $users
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $id)
    {
        $id->delete();
        return to_route('departments.index')->with('message','Department was successfully erased!');
    }
}
