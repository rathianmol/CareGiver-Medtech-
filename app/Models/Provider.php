<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'care_type',
        'speciality_care_type',
        'available',
    ];

    public function patients(){
        return $this->belongsToMany(Patient::class, 'patient_provider');
    }
}
