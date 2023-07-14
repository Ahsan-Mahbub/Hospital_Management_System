<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'admissions';
    protected $fillable = [
        'patient_id',
        'department_id',
        'doctor_id',
        'admission_date',
        'case',
        'casuality',
        'patient_type',
        'reference',
        'details',
        'creadit_limit',
        'room_id',
        'ward_id',
        'bed_id'
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    // public function patient(){
    //     return $this->belongsTo(Patient::class, 'patient_id');
    // }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    // public function bed(){
    //     return $this->belongsTo(Bed::class, 'bed_id');
    // }

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}