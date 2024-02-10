<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'id_payment';
    protected $fillable = [
        'id_booking',
        'tgl_payment',
        'sar_idr',
        'usd_idr',
        'deposit',
        'metode_bayar',
    ];
    // Define the relationship with booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}
