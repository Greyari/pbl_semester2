<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <title>Indeks Keren dengan Tailwind CSS</title>
    <style>
        /* Custom styles for slider */
        .slider-container {
            position: relative;
            width: 50%;
            margin: auto;
            overflow: hidden;
        }
        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slider img {
            min-width: 100%;
            height: auto;
        }
        .slider-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
        }
        .prev-button {
            left: 0;
        }
        .next-button {
            right: 0;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar Start -->
    <nav class="fixed top-0 left-0 w-full bg-black bg-opacity-70 p-4 z-50">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-white font-bold text-xl cursor-default">
                Sell<span class="text-red-600">Phone</span>
            </div>
            <div class="space-x-4">
                <a href="#" class="text-white hover:text-black">Tentang Kami</a>
                <a href="#" class="text-white hover:text-black">Kontak</a>
                <a href="#" class="text-white hover:text-black">Login</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="pt-24">
        <!-- Welcome Text Start -->
        <p class="text-blue-600 text-center py-8 font-bold text-2xl">Welcome!</p>
        <!-- Welcome Text End -->

        <!-- Image Slider Start -->
        <div class="slider-container">
            <div class="slider">
                <img src="/img/hp1.jpg" alt="Slide 1" class="rounded-lg">
                <img src="/img/hp2.jpg" alt="Slide 2" class="rounded-lg">
                <img src="/img/hp3.jpg" alt="Slide 3" class="rounded-lg">
            </div>
            <button class="slider-button prev-button" onclick="prevSlide()">&#10094;</button>
            <button class="slider-button next-button" onclick="nextSlide()">&#10095;</button>
        </div>
        <!-- Image Slider End -->

        <!-- Categories Start -->
        <div class="flex justify-center py-8">
            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-white hover:bg-sky-500 rounded-full px-6 py-2">SAMSUNG</a>
                <a href="#" class="bg-white hover:bg-sky-500 rounded-full px-6 py-2">IPHONE</a>
                <a href="#" class="bg-white hover:bg-sky-500 rounded-full px-6 py-2">XIAOMI</a>
                <a href="#" class="bg-white hover:bg-sky-500 rounded-full px-6 py-2">HUAWEI</a>
            </div>
        </div>
        <!-- Categories End -->

        <!-- About Start -->
        <div class="container mx-auto p-8 mt-16 bg-white rounded-md shadow-md flex flex-col md:flex-row">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-bold text-center mb-11">About</h2>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec dui
                    vel ligula efficitur euismod. Proin ultricies dui vel augue aliquam,
                    at dapibus sem cursus.
                </p>
            </div>
            <!-- About Image -->
            <div class="md:w-1/2 mt-4 md:mt-0 md:ml-4">
                <img src="/img/logo.jpg" alt="About Image" class="w-full h-auto rounded-md">
            </div>
        </div>
        <!-- About End -->
    </div>

    <!-- Footer Start -->
    <footer class="bg-black text-white p-8 mt-14">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
            <!-- Social Media -->
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Sosial Media</h3>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-white hover:text-gray-400">Facebook</a></li>
                    <li><a href="#" class="text-white hover:text-gray-400">Twitter</a></li>
                    <li><a href="#" class="text-white hover:text-gray-400">Instagram</a></li>
                </ul>
            </div>
            <!-- Contact -->
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Kontak</h3>
                <p>Email: info@example.com</p>
                <p>Telepon: (123) 456-7890</p>
            </div>
            <!-- Address -->
            <div>
                <h3 class="text-xl font-bold mb-2">Alamat</h3>
                <p>Jalan Contoh No. 123</p>
                <p>Kota Contoh, 12345</p>
                <p>Indonesia</p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider img');
        let slideInterval = setInterval(nextSlide, 3000); // Change slide every 3 seconds

        function showSlide(index) {
            if (index >= slides.length) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = index;
            }
            const offset = -currentSlide * 100;
            document.querySelector('.slider').style.transform = translateX(${offset}%);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Reset interval when manual slide change occurs
        document.querySelector('.prev-button').addEventListener('click', () => {
            clearInterval(slideInterval);
            prevSlide();
            slideInterval = setInterval(nextSlide, 3000);
        });

        document.querySelector('.next-button').addEventListener('click', () => {
            clearInterval(slideInterval);
            nextSlide();
            slideInterval = setInterval(nextSlide, 3000);
        });

        showSlide(currentSlide);
    </script>
</body>
</html>
