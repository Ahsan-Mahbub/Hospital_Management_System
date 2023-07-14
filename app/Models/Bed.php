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
    
    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
    
    /**
     * Get the patient associated with the Bed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentAdmisson()
    {
        return $this->hasOne(Admission::class)->latest();
    }
    
    public function getPatientNameAttribute()
    {
        if($this->admissions->isNotEmpty() && $this->admissions->first()->patient) {
            return $this->admissions->first()->patient->patient_name;
        }
        
        return null;
    }
    
    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }
}