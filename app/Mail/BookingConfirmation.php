<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Konfirmasi Booking Anda')
            ->view('emails.booking_confirmation')
            ->with([
                'nama' => $this->booking->nama,
                'tanggal' => $this->booking->tanggal,
                'jumlah_anggota' => $this->booking->jumlah_anggota,
                'destinasi' => $this->booking->destinasi,
                'total_harga' => $this->booking->total_harga,
                'order_id' => $this->booking->order_id,
            ]);
    }
}
