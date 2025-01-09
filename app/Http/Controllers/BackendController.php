<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BackendController extends Controller
{
    public function index()
    {
        // Ambil data bookings dengan pagination
        $bookings = Booking::paginate(10); // 10 adalah jumlah item per halaman
    
        // Kirim data ke view
        return view('backend.index', compact('bookings'));
    }
    

    public function bookings()
    {
        // Ambil data bookings dengan pagination
        $bookings = Booking::paginate(10);

        // Kirim data ke view
        return view('admin.bookings', compact('bookings'));
    }
}
