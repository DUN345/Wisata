<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TicketNotification;
use Illuminate\Support\Facades\Mail;

class emailNotifController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'tiket' => 'required|string',
            'ticketCode' => 'required|string',
        ]);

        Mail::to($data['email'])->send(new TicketNotification($data));

        return response()->json(['message' => 'Email terkirim']);
    }
}
