<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    use HasFactory;

    protected $fillable = ['name','bed_price'];

    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }
}