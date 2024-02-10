<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = 'booking_details';
    protected $primaryKey = 'id_booking_detail';
    protected $fillable = [
        'booking_id',
        'hotel_id',
        'room_id',
        'qty',
        'check_in',
        'check_out',
        'malam',
        'mata_uang',
        'tarif',
        'discount',
        'subtotal',
    ];

    // Define the inverse relationship with Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }
    // Define the relationship with Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    // Define the relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
