<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'patients';
    protected $fillable = [
        'patient_name',
        'email',
        'phone',
        'mobile',
        'password',
        'sex',
        'blood_group',
        'bdate',
        'address',
        'image',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
