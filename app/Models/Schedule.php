<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'schedules';
    protected $fillable = [
        'doctor_id',
        'available_day',
        'start_time',
        'end_time',
        'per_patient_time',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}