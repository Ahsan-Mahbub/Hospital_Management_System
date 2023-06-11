<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'appointments';
    protected $fillable = [
        'patient_id',
        'department_id',
        'doctor_id',
        'date',
        'schedule_time_id',
        'problem',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function schedule_time(){
        return $this->belongsTo(ScheduleTime::class, 'schedule_time_id');
    }
}
