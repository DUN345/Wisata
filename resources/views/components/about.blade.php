<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesona Karang Anyar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Header -->
  @include('components.header')

  <!-- Main Content -->
  <main class="w-full bg-gray-50 py-10">
    <div class="bg-white p-8 rounded-lg shadow-lg mx-auto max-w-7xl">
      <h1 class="text-emerald-700 text-2xl font-bold text-center mb-4">Pesona Karang Anyar</h1>
      <p class="text-gray-600 mb-6 text-justify">
        Selamat datang di Pesona Karang Anyar, destinasi wisata yang menggabungkan keindahan alam, edukasi, dan konservasi di tengah kawasan Karanganyar. Kami berkomitmen untuk menghadirkan pengalaman unik yang mempertemukan pengunjung dengan kekayaan flora lokal dan berbagai aktivitas pertanian modern.
      </p>
      <hr class="border-emerald-300 mb-6">
      
      <h2 class="text-emerald-700 text-xl font-semibold mb-2">Visi</h2>
      <p class="text-gray-600 mb-6 text-justify">
        Menjadi pusat wisata terkemuka di Indonesia yang memberikan pengalaman edukasi, konservasi, dan rekreasi berkelanjutan untuk semua kalangan.
      </p>
      <hr class="border-emerald-300 mb-6">

      <h2 class="text-emerald-700 text-xl font-semibold mb-2">Misi</h2>
      <ul class="list-disc list-inside text-gray-600 space-y-2 text-justify">
        <li>Mengedukasi masyarakat tentang pentingnya konservasi tanaman dan pertanian berkelanjutan.</li>
        <li>Menyediakan lingkungan yang mendukung penelitian dan inovasi di bidang botani dan agrikultur.</li>
        <li>Menyajikan pengalaman wisata yang menyatu dengan alam, sekaligus mempromosikan budaya lokal.</li>
      </ul>
    </div>
  </main>

  <!-- Footer -->
  @include('components.footer')
</body>
</html>
