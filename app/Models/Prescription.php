<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'prescriptions';
    protected $fillable = [
        'patient_id',
        'food_allergies',
        'trendency_bleed',
        'heart_disease',
        'blood_presure',
        'diabetic',
        'surgery',
        'accident',
        'others',
        'family_medical_history',
        'current_medication',
        'female_pregrancy',
        'breast_feeding',
        'helth_inssurance',
        'low_income',
        'reference',
        'status',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
