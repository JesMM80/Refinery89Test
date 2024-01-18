<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'department_users', 'department_id', 'user_id');
    }

    public function subdepartments()
    {
        return $this->belongsToMany(Department::class, 'department_subdepartments', 'department_id', 'subdepartment_id');
    }

    public function parentDepartments()
    {
        return $this->belongsToMany(Department::class, 'department_subdepartments', 'subdepartment_id', 'department_id');
    }
}
