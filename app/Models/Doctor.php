<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'doctors';
    protected $fillable = [
        'doctor_name',
        'email',
        'phone',
        'mobile',
        'password',
        'designation',
        'department_id',
        'sex',
        'blood_group',
        'bdate',
        'specialist',
        'address',
        'biography',
        'education',
        'image',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
}