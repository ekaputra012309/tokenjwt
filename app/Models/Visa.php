<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $table = 'visas';
    protected $primaryKey = 'id_visa';
    protected $fillable = [
        'visa_id',
        'tgl_visa',
        'agent_id',
        'tgl_keberangkatan',
        'jumlah_pax',
        'harga_pax',
        'total',
        'status',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}
