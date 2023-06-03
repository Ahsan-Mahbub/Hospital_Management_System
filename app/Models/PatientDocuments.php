<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDocuments extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'patient_documents';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'details',
        'file',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

}
