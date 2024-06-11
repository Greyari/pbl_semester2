<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 400px;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-blue-600 text-white py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">Product Showcase</h1>
        <nav>
            <a href="#" class="text-lg px-3 hover:text-gray-200">Home</a>
            <a href="#" class="text-lg px-3 hover:text-gray-200">Products</a>
            <a href="#" class="text-lg px-3 hover:text-gray-200">Contact</a>
        </nav>
    </div>
</header>

<!-- Slider -->
<div class="swiper-container mt-5">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="https://via.placeholder.com/1200x400//img/hpku1.png" alt="/img/hpku1.png"></div>
        <div class="swiper-slide"><img src="https://via.placeholder.com/1200x400" alt="/img/hpku2.png"></div>
        <div class="swiper-slide"><img src="https://via.placeholder.com/1200x400" alt="Slide 3"></div>
        <div class="swiper-slide"><img src="https://via.placeholder.com/1200x400" alt="Slide 4"></div>
        <div class="swiper-slide"><img src="https://via.placeholder.com/1200x400" alt="Slide 5"></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>

<!-- Main Content -->
<main class="container mx-auto my-10 p-5">
    <h2 class="text-2xl font-semibold mb-5">Our Products</h2>
    <!-- Product Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Product Cards -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://via.placeholder.com/400x300" alt="Product Image" class="w-full h-48 object-cover">
            <div class="p-5">
                <h3 class="text-xl font-bold">Product Name</h3>
                <p class="text-gray-700 mt-2">This is a short description of the product. It's very cool and useful.</p>
                <p class="text-blue-600 font-semibold mt-4">$49.99</p>
            </div>
        </div>
        <!-- More Product Cards -->
    </div>

    <!-- Best Selling Products -->
    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-5">Best Selling Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Best Selling Product Cards -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/400x300" alt="Best Selling Product" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-xl font-bold">Best Selling Product Name</h3>
                    <p class="text-gray-700 mt-2">This is a short description of the best selling product.</p>
                    <p class="text-blue-600 font-semibold mt-4">$99.99</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <img src="https://via.placeholder.com/400x300" alt="Best Selling Product" class="w-full h-48 object-cover">
              <div class="p-5">
                  <h3 class="text-xl font-bold">Best Selling Product Name</h3>
                  <p class="text-gray-700 mt-2">This is a short description of the best selling product.</p>
                  <p class="text-blue-600 font-semibold mt-4">$99.99</p>
              </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://via.placeholder.com/400x300" alt="Best Selling Product" class="w-full h-48 object-cover">
            <div class="p-5">
                <h3 class="text-xl font-bold">Best Selling Product Name</h3>
                <p class="text-gray-700 mt-2">This is a short description of the best selling product.</p>
                <p class="text-blue-600 font-semibold mt-4">$99.99</p>
            </div>
        </div>

            <!-- More Best Selling Products -->
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Product Showcase. All rights reserved.</p>
    </div>
</footer>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>

</body>
</html>
