<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTime extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'schedule_times';
    protected $fillable = [
        'schedule_id',
        'schedule_time',
        'doctor_id',
        'date',
        'schedule_booked'
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
