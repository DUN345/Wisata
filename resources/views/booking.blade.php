<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Now</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-your-client-key"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    @include('components.header')

    <!-- Container -->
    <div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-md max-w-5xl">
        <h1 class="text-3xl font-bold text-green-600 text-center mb-4">BOOKING NOW</h1>
        <p class="text-lg text-gray-600 text-center mb-8">Lengkapi Data Anda untuk Melanjutkan Pemesanan</p>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Grid Layout -->
        <div class="grid grid-cols-2 gap-8">
            <!-- Form Section -->
            <div>
                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-lg font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-md focus:border-green-500 focus:ring-green-500 text-lg"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-md focus:border-green-500 focus:ring-green-500 text-lg"
                            required>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal" class="block text-lg font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-md focus:border-green-500 focus:ring-green-500 text-lg"
                            required>
                    </div>

                    <!-- Jumlah Anggota -->
                    <div>
                        <label for="jumlah_anggota" class="block text-lg font-medium text-gray-700">Jumlah
                            Anggota</label>
                        <input type="number" id="jumlah_anggota" name="jumlah_anggota" min="1"
                            oninput="hitungHarga()"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-md focus:border-green-500 focus:ring-green-500 text-lg"
                            required>
                    </div>

                    <!-- Pilih Destinasi -->
                    <div>
                        <label for="destinasi" class="block text-lg font-medium text-gray-700">Pilih Destinasi</label>
                        <select id="destinasi" name="destinasi" onchange="hitungHarga()"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-md focus:border-green-500 focus:ring-green-500 text-lg"
                            required>
                            <option value="" disabled selected>Pilih Tiket</option>
                            <option value="Bukit Mongkrang">Bukit Mongkrang</option>
                            <option value="Intan Pari">Intan Pari</option>
                            <option value="Tenggir Park">Tenggir Park</option>
                            <option value="Taman Satwa">Taman Satwa</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="button" id="pay-button"
                        class="w-full bg-green-500 text-white py-3 px-6 text-lg rounded-md hover:bg-green-600 transition">
                        Bayar
                    </button>
                </form>
            </div>

            <!-- Detail Pemesanan -->
            <div class="bg-gray-50 p-6 rounded-md border border-gray-200 shadow-md">
                <h4 class="text-xl font-semibold text-gray-700 mb-6">Detail Pemesanan</h4>
                <p class="text-lg text-gray-600 mb-4">Nama: <span id="detailNama"
                        class="font-semibold text-green-600">-</span></p>
                <p class="text-lg text-gray-600 mb-4">Email: <span id="detailEmail"
                        class="font-semibold text-green-600">-</span></p>
                <p class="text-lg text-gray-600 mb-4">Tanggal: <span id="detailTanggal"
                        class="font-semibold text-green-600">-</span></p>
                <p class="text-lg text-gray-600 mb-4">Jumlah Anggota: <span id="detailJumlahAnggota"
                        class="font-semibold text-green-600">-</span></p>
                <p class="text-lg text-gray-600 mb-4">Total Harga: <span id="totalHarga"
                        class="font-semibold text-green-600">-</span></p>
            </div>
        </div>
    </div>

    
    <!-- Status Pembayaran -->
    <div id="paymentStatus" class="hidden bg-gray-100 p-4 mt-6 rounded-md shadow-md">
        <h4 class="text-lg font-semibold text-gray-700">Status Pembayaran:</h4>
        <p id="statusMessage" class="text-gray-600">Menunggu status pembayaran...</p>
    </div>

    <!-- Script -->
    <script>
        //untuk daftar harganya
        const hargaPerDestinasi = {
            "Bukit Mongkrang": 15000,
            "Intan Pari": 35000,
            "Tenggir Park": 10000,
            "Taman Satwa": 10000
        };
        // fungsi hitung total harga
        function hitungHarga() {
            const jumlahAnggota = parseInt(document.getElementById('jumlah_anggota').value) || 0;
            const destinasi = document.getElementById('destinasi').value;
            const totalHarga = jumlahAnggota * (hargaPerDestinasi[destinasi] || 0);

            document.getElementById('totalHarga').textContent = totalHarga > 0 ? `Rp. ${totalHarga.toLocaleString()}` :
                "Pilih destinasi dahulu";
            document.getElementById('detailJumlahAnggota').textContent = jumlahAnggota || '-';
        }
        //ketika user menginput data nya maka secara sendirinya detailpemesanan nya akan diinput
        document.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('input', function() {
                const id = this.id.charAt(0).toUpperCase() + this.id.slice(1);
                const detailField = document.getElementById('detail' + id);
                if (detailField) detailField.textContent = this.value || '-';
            });
        });
        //fungsi ketika img diclik maka pilih destinasi akan diinput secara sendirinya
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const destination = urlParams.get('destination');

            if (destination) {
                const destinasiInput = document.getElementById('destinasi');
                destinasiInput.value = destination;
                hitungHarga();
            }
        });

        //scrip untuk status pembayaran dan snap token
        document.getElementById('pay-button').addEventListener('click', function() {
            const form = document.getElementById('bookingForm');
            const formData = new FormData(form);

            fetch("{{ route('booking.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.token) {
                        snap.pay(data.token, {
                            onSuccess: function(result) {
                                alert('Pembayaran berhasil!');
                                location.reload();
                            },
                            onPending: function(result) {
                                alert('Pembayaran sedang diproses.');
                                location.reload();

                            },
                            onError: function(result) {
                                alert('Pembayaran gagal.');
                                location.reload();

                            }
                        });
                    } else {
                        alert('Gagal mendapatkan token pembayaran.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
        });
    </script>


    @include('components.footer')
</body>

</html>
