<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sell Phone</title>
    <link rel="stylesheet" href="css/index.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
  </head>
  <body style="height: 900px; margin-top: 0" class="bg-gray-100">
    <!-- navbar start -->
    <nav
      style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 1rem;
        z-index: 1000;
      "
    >
      <div class="container mx-auto flex items-center justify-between">
        <div class="text-white font-bold text-xl cursor-default">
          Sell<span class="text-red-600">Phone</span>
        </div>

        <div class="space-x-4">
          <a href="#" class="text-white hover:text-black">Tentang Kami</a>
          <a href="#" class="text-white hover:text-black">Kontak</a>
          <a href="{{'/login'}}" class="text-white hover:text-black">Login</a>
        </div>
      </div>
    </nav>
    <!-- navbar end -->

    <p class="text-blue-600 text-center py-20 font-bold">Welcome!</p>
    <!-- swiper start -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!-- Gambar Slide -->
        <div class="swiper-slide">
          <img src="{{asset('img/hp1.jpg')}}" alt="Slide 1 " class="h-72 m-auto" />
        </div>
        <div class="swiper-slide">
          <img src="{{asset('img/hp2.png')}}" alt="Slide 2 " class="h-72 m-auto" />
        </div>
        <div class="swiper-slide">
          <img src="{{asset('img/hp3.png')}}" alt="Slide 3 " class="h-72 m-auto" />
        </div>
        <!-- Tambahkan gambar slide lainnya sesuai kebutuhan -->
      </div>
      <!-- Tombol navigasi Swiper -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <!-- swiper end -->

    <!-- kategori start -->
    <div class="mt-12 flex justify-center">
      <div class="justify-between">
        <a href="#" class="bg-white hover:bg-sky-500 rounded-full mx-10"
          >SAMSUNG</a
        >
        <a href="#" class="bg-white hover:bg-sky-500 rounded-sm mx-10"
          >SAMSUNG</a
        >
        <a href="#" class="bg-white hover:bg-sky-500 rounded-sm mx-10"
          >SAMSUNG</a
        >
        <a href="#" class="bg-white hover:bg-sky-500 rounded-sm mx-10"
          >SAMSUNG</a
        >
      </div>
    </div>
    <!-- kategori end -->

    <!-- about start -->
    <div
      class="container mx-auto p-8 mt-16 bg-white rounded-md shadow-md flex flex-col md:flex-row"
    >
      <div class="md:w-1/2">
        <h2 class="text-2xl font-bold text-center mb-11">About</h2>
        <p class="text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec dui
          vel ligula efficitur euismod. Proin ultricies dui vel augue aliquam,
          at dapibus sem cursus.
        </p>
      </div>

      <!-- Gambar -->
      <div class="md:w-1/2 mt-4 md:mt-0 md:ml-4">
        <img
          src="{{asset('img/logo.jpg')}}"
          alt="About Image"
          class="w-full h-auto rounded-md"
        />
      </div>
    </div>
    <!-- about end -->

    <!-- footer start -->
    <footer class="bg-black text-white p-8 mt-14">
      <div
        class="container mx-auto flex flex-col md:flex-row items-center justify-between"
      >
        <!-- Sosial Media -->
        <div class="mb-4 md:mb-0">
          <h3 class="text-xl font-bold mb-2">Sosial Media</h3>
          <ul class="flex space-x-4">
            <li>
              <a href="#" class="text-white hover:text-gray-400">Facebook</a>
            </li>
            <li>
              <a href="#" class="text-white hover:text-gray-400">Twitter</a>
            </li>
            <li>
              <a href="#" class="text-white hover:text-gray-400">Instagram</a>
            </li>
          </ul>
        </div>

        <!-- Kontak -->
        <div class="mb-4 md:mb-0">
          <h3 class="text-xl font-bold mb-2">Kontak</h3>
          <p>Email: info@example.com</p>
          <p>Telepon: (123) 456-7890</p>
        </div>

        <!-- Alamat -->
        <div>
          <h3 class="text-xl font-bold mb-2">Alamat</h3>
          <p>Jalan Contoh No. 123</p>
          <p>Kota Contoh, 12345</p>
          <p>Indonesia</p>
        </div>
      </div>
    </footer>
    <!-- footer end -->
  </body>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      // Opsi Swiper di sini
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  </script>
</html>
