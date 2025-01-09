<main>
  <script src="https://cdn.tailwindcss.com"></script>
  <section class="flex items-center justify-between px-20 pt-10">
      <!-- Text on the left -->
      <div class="flex-1 pr-16 max-w-4xl">
          <h1 class="text-4xl text-gray-800 leading-tight font-bold">
            Let’s Explore Now <br> And 
            <span class="text-green-600 italic">Discover Nature</span>, <br> 
            Beauty In Karanganyar.
          </h1>
          <p class="text-lg text-gray-600 mt-4">
            Don't Wait Any Longer, Now is the Time to Explore Karanganyar and Reveal the Unique Beauty of Mongkrang Hill.
          </p>
          <div class="mt-6 space-x-4">
            
            <a href="/booking" 
               class="bg-blue-600 text-white py-2 px-6 rounded-lg text-base hover:bg-blue-700 transition-colors duration-300">
               Booking
            </a>
          </div>
      </div>
      <!-- Images on the right -->
      <div class="relative w-[400px] h-[500px] pt-10">
          <img class="absolute top-28 left-5 w-[180px] h-[220px] rounded shadow-lg border-4 border-white" src="{{ asset('image/gambar5.jpg') }}" />
          <img class="absolute top-52 left-[170px] w-[180px] h-[220px] rounded shadow-lg border-4 border-white" src="{{ asset('image/gambar6.jpg') }}" />
          <img class="absolute top-[260px] left-[50px] w-[170px] h-[180px] rounded shadow-lg border-4 border-white" src="{{ asset('image/gambar7.jpg') }}" />
      </div>
  </section>
</main>
