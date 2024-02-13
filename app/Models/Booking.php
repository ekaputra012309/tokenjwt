<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $primaryKey = 'id_booking';
    protected $fillable = [
        'booking_id',
        'tgl_booking',
        'agent_id',
        'check_in',
        'check_out',
        'mata_uang',
        'keterangan',
        'total_discount',
        'total_subtotal',
    ];

    // Define the relationship with BookingDetail
    public function details()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'booking_id');
    }
    // Define the relationship with Agent
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
