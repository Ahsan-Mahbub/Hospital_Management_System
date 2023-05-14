<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'departments';
    protected $fillable = [
        'department_name',
        'details',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
        
}
