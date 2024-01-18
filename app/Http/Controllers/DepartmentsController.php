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
        $departments = Department::select('id', 'name')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('departments.index',['departments' => $departments]);
    }

    /**
     * Display a listing of the hierarchy departments.
     */
    public function hierarchy()
    {
        $departments = Department::select('id', 'name')->paginate(5);

        return view('departments.hierarchy',['departments' => $departments]);
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
        return view('departments.show', ['department' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);

        $department->name = $request->name;
        $department->save();

        $departments = Department::select('id', 'name')->paginate(5);

        return view('departments.index',['departments' => $departments]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $id)
    {
        $id->delete();
        return to_route('departments.index')->with('message','Department was successfully erased!');
    }
    
    public function assignUserCreate(Department $department)
    {
        $users = User::select('id', 'name')
            ->orderBy('name', 'desc')
            ->get(); 

        return view('departments.assignUserCreate',['department' => $department,'users' => $users,]);
    }
    
    public function assignUserStore(Request $request, Department $department)
    {
        $userId = $request->input('user');
        $user = User::find($userId);

        // Verificar si el usuario ya está asignado al departamento
        if ($user->departments->contains($department->id)) {
            return redirect()->route('departments.assignUserCreate', $department)->with('error', 'User is already assigned to the department');
        }

        // Asociar el usuario al departamento
        $user->departments()->attach($department);

        return redirect()->route('departments.assignUserCreate', $department)->with('message', 'User assigned successfully');
        
    }

    public function assignDepartmentCreate(Department $department)
    {
        $departments = Department::select('id', 'name')
            ->orderBy('id', 'desc')
            ->get();

        return view('departments.assignDepartmentCreate',['department' => $department,'departments' => $departments,]);
    }
    
    public function assignDepartmentStore(Request $request, Department $department)
    {
        $subdepartmentId = $request->input('subdepartment');
        $subdepartment = Department::find($subdepartmentId);

        // Verificar si el subdepartamento ya está asociado al departamento
        if ($department->subdepartments->contains($subdepartment->id)) {
            return redirect()->route('departments.assignDepartmentCreate', $department)->with('error', 'Subdepartment is already assigned to the department');
        }

        // Asociar el subdepartamento al departamento sin eliminar relaciones existentes
        $subdepartment->subdepartments()->syncWithoutDetaching([$department->id]);

        return redirect()->route('departments.assignDepartmentCreate', $department)->with('message', 'Subdepartment assigned successfully');
        
    }

}
