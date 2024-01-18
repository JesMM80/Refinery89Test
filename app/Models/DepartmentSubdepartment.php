<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSubdepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'subdepartment_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function subdepartment()
    {
        return $this->belongsTo(Department::class, 'subdepartment_id');
    }
}
