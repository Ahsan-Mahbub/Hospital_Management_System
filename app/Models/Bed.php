<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'bed_type_id', 'ward_id'];

    public function bedType()
    {
        return $this->belongsTo(BedType::class, 'bed_type_id');
    }
    
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
    
    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }
}