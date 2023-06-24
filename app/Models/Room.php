<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['floor_id', 'bed_capacity', 'name', 'description'];
    
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }
}