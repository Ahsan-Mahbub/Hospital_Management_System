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
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
