<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class BookingController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
    /**
     * Tampilkan form booking dengan opsi destinasi (jika ada).
     */
    public function showBookingForm(Request $request)
    {
        $destination = $request->query('destination', '');
        return view('booking', ['destination' => $destination]);
    }

    /**
     * Simpan data booking ke dalam database dan proses token pembayaran.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'tanggal' => 'required|date',
            'jumlah_anggota' => 'required|integer|min:1',
            'destinasi' => 'required|string',
        ]);

        $hargaPerDestinasi = [
            "Bukit Mongkrang" => 15000,
            "Intan Pari" => 35000,
            "Tenggir Park" => 10000,
            "Taman Satwa" => 10000,
        ];

        $totalHarga = isset($hargaPerDestinasi[$validated['destinasi']])
            ? $hargaPerDestinasi[$validated['destinasi']] * $validated['jumlah_anggota']
            : 0;

        $orderID = 'ORDER-' . uniqid();

        $booking = Booking::create([
            'order_id' => $orderID,
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'tanggal' => $validated['tanggal'],
            'jumlah_anggota' => $validated['jumlah_anggota'],
            'destinasi' => $validated['destinasi'],
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderID,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $validated['nama'],
                'email' => $validated['email'],
            ],
            'item_details' => [
                [
                    'id' => $validated['destinasi'],
                    'price' => $hargaPerDestinasi[$validated['destinasi']],
                    'quantity' => $validated['jumlah_anggota'],
                    'name' => $validated['destinasi'],
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'success' => true,
                'token' => $snapToken,
                'booking' => $booking
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses pembayaran.',
            ], 500);
        }
    }

    /**
     * Callback dari Midtrans untuk memperbarui status pembayaran.
     */
    public function midtransCallback(Request $request)
    {
        $json = $request->getContent();
        $notification = json_decode($json);

        Log::info('Midtrans Callback Payload: ' . $json);

        if (!isset($notification->order_id) || !isset($notification->transaction_status)) {
            Log::error('Invalid Midtrans callback payload: Missing order_id or transaction_status');
            return response()->json(['success' => false, 'message' => 'Invalid callback payload'], 400);
        }

        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type ?? null;
        $fraudStatus = $notification->fraud_status ?? null;

        $booking = Booking::where('order_id', $orderId)->first();

        if (!$booking) {
            Log::error('Booking not found for order_id: ' . $orderId);
            return response()->json(['success' => false, 'message' => 'Booking not found'], 404);
        }

        try {
            if ($transactionStatus === 'capture') {
                if ($paymentType === 'credit_card') {
                    $booking->status = ($fraudStatus === 'challenge') ? 'challenge' : 'success';
                }
            } elseif ($transactionStatus === 'settlement') {
                $booking->status = 'success';
            } elseif ($transactionStatus === 'pending') {
                $booking->status = 'pending';
            } elseif ($transactionStatus === 'deny') {
                $booking->status = 'deny';
            } elseif ($transactionStatus === 'expire') {
                $booking->status = 'expired';
            } elseif ($transactionStatus === 'cancel') {
                $booking->status = 'canceled';
            }

            $booking->save();

            Log::info('Booking status updated successfully for order_id: ' . $orderId);

            return response()->json(['success' => true, 'message' => 'Callback processed successfully']);
        } catch (\Exception $e) {
            Log::error('Failed to update booking status: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update booking status'], 500);
        }
    }
}
