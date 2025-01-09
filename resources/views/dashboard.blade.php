<html>

<head>
    <title>Pesona Karanganyar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    @include('components.header')
    @include('components.content')


    <section>
        <h2 class="text-center text-4xl font-semibold text-gray-800 mt-12 mb-5">Explore Karanganyar Hill</h2>
        <h2 class="text-center text-4xl font-semibold text-gray-800 mt-12 mb-5">Selamat datang di destinasi Pesona Karang
            Anyar</h2>
        <div class="w-full">
            <img src="{{ asset('image/gambar10.jpg') }}" alt="Sunflower field in Narmada Botanic Garden"
                class="w-full rounded-lg shadow-md object-cover h-[400px]">
        </div>
        <p class="text-3xl font-semibold text-center mb-8 my-10">Silakan pilih destinasi Anda untuk menikmati keindahan
            alam
            Karanganyar.</p>
        <div class="card-container flex justify-center flex-wrap gap-5 p-5 pt-12 bg-white">
            <!-- Card 1 -->
            <div
                class="card bg-white rounded-lg shadow-md w-[220px] overflow-hidden transition-transform duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                <img src="{{ asset('image/gambar12.jpg') }}" alt="Bukit Mongkrang"
                    class="w-full h-[150px] object-cover rounded-md cursor-pointer"
                    onclick="redirectToBooking('Bukit Mongkrang')">
                <div class="card-body p-4 text-center">
                    <h3 class="text-lg font-bold text-[#333] mb-2">Bukit Mongkrang</h3>
                    <p class="text-sm text-[#555]">Open: 9am - 5pm</p>
                    <p class="text-sm text-[#555]">Location: Tlogo, Dringo, Gondosuli, Tawangmangu, Karanganyar, Jawa
                        Tengah</p>
                    <p class="price text-lg font-bold text-[#27ae60] mt-2">Rp. 15,000</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="card bg-white rounded-lg shadow-md w-[220px] overflow-hidden transition-transform duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                <img src="{{ asset('image/intanpari.jpg') }}" alt="Narmada Botanic Garden"
                    class="w-full h-[150px] object-cover rounded-md cursor-pointer"
                    onclick="redirectToBooking('Intan Pari')">
                <div class="card-body p-4 text-center">
                    <h3 class="text-lg font-bold text-[#333] mb-2">Intan Pari</h3>
                    <p class="text-sm text-[#555]">Open: 9am - 5pm</p>
                    <p class="text-sm text-[#555]">Location: Jl. Jend. Gatot Subroto, Beningrejo, Gaum, Kec. Tasikmadu,
                        Kabupaten Karanganyar, Jawa Tengah</p>
                    <p class="price text-lg font-bold text-[#27ae60] mt-2">Rp. 35,000</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="card bg-white rounded-lg shadow-md w-[220px] overflow-hidden transition-transform duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                <img src="{{ asset('image/images.jpg') }}" alt="Taman Satwa"
                    class="w-full h-[150px] object-cover rounded-md cursor-pointer"
                    onclick="redirectToBooking('Taman Satwa')">
                <div class="card-body p-4 text-center">
                    <h3 class="text-lg font-bold text-[#333] mb-2">Taman Satwa</h3>
                    <p class="text-sm text-[#555]">Open: 9am - 4pm</p>
                    <p class="text-sm text-[#555]">Location: Spranten, Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar,
                        Jawa Tengah</p>
                    <p class="price text-lg font-bold text-[#27ae60] mt-2">Rp. 10,000</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div
                class="card bg-white rounded-lg shadow-md w-[220px] overflow-hidden transition-transform duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                <img src="{{ asset('image/tenggir.jpg') }}" alt="Tenggir Park"
                    class="w-full h-[150px] object-cover rounded-md cursor-pointer"
                    onclick="redirectToBooking('Tenggir Park')">
                <div class="card-body p-4 text-center">
                    <h3 class="text-lg font-bold text-[#333] mb-2">Tenggir Park</h3>
                    <p class="text-sm text-[#555]">Open: 9am - 5pm</p>
                    <p class="text-sm text-[#555]">Location: Tambak, Berjo, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa
                        Tengah</p>
                    <p class="price text-lg font-bold text-[#27ae60] mt-2">Rp. 10,000</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="text-3xl font-semibold text-center mb-8 my-10">Pesona Karang Anyar Gallery</h2>
        <div class="grid grid-cols-4 gap-4">
            <!-- Image 1 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar11.jpg') }}" alt="Sunflower close-up"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 2 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar13.jpg') }}" alt="Botanic garden landscape"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 3 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar14.jpg') }}" alt="Sunflower field"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 4 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar15.jpg') }}" alt="Sunflower garden"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 5 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar16.jpg') }}" alt="Sunflower in bloom"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 6 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar17.jpg') }}" alt="Sunflower close-up"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 7 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar18.jpeg') }}" alt="Sunflower close-up"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Image 8 -->
            <div class="col-span-1">
                <img src="{{ asset('image/gambar19.jpeg') }}" alt="Sunflower close-up"
                    class="w-full h-[200px] object-cover rounded-lg shadow-md">
            </div>
        </div>
    </section>



    @include('components.footer')
    <script>
        function redirectToBooking(destination) {
            const bookingUrl = `/booking?destination=${encodeURIComponent(destination)}`;
            window.location.href = bookingUrl;
        }
    </script>
</body>

</html>
