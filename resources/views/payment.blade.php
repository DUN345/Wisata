<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        function payNow() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    console.log(result);
                    window.location.href = '/booking/success'; // Redirect ke halaman sukses
                },
                onPending: function(result) {
                    alert('Pembayaran menunggu.');
                    console.log(result);
                },
                onError: function(result) {
                    alert('Pembayaran gagal!');
                    console.log(result);
                },
                onClose: function() {
                    alert('Anda menutup halaman pembayaran.');
                }
            });
        }
    </script>
</head>
<body>
    <h1>Metode Pembayaran</h1>
    <p>Halo, {{ $booking->nama }}</p>
    <p>Destinasi: {{ $booking->destinasi }}</p>
    <p>Total Harga: Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</p>
    <button onclick="payNow()">Bayar Sekarang</button>
</body>
</html>
