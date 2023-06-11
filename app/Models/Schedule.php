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
        'start_time',
        'end_time',
        'per_patient_time',
        'date',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}