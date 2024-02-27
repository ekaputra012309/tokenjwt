<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaDetail extends Model
{
    use HasFactory;
    protected $table = 'visa_details';
    protected $primaryKey = 'id_visa_detail';
    protected $fillable = [
        'id_visa',
        'tgl_payment_visa',
        'kurs_bsi',
        'kurs_riyal',
        'deposit',
    ];
    // Define the relationship with visa
    public function visa()
    {
        return $this->belongsTo(Visa::class, 'id_visa');
    }
}
