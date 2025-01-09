<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'order_id',
        'nama',
        'email',
        'tanggal',
        'jumlah_anggota',
        'destinasi',
        'total_harga',
        'status',
       
    ];
}
