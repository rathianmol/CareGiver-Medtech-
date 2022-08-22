<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_detail',
        'service_description',
        'total_charge',
        'total_payment',
        'total_adjustment',
        'account_balance',
        'status',
        'due_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    } 
}
