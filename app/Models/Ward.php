<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['ward_name', 'room_id', 'description'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
    public function beds()
    {
        return $this->hasMany(Bed::class);
    }
    
    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }
}