<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/index.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <style>
        /* Global Styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            height: 40px;
            width: auto;
        }

        .navbar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar-menu li {
            margin-right: 20px;
        }

        .navbar-menu li:last-child {
            margin-right: 0;
        }

        .navbar-menu a {
            color: #fff;
            text-decoration: none;
        }

        /* Sidebar Styles */
        aside {
            background-color: #6c757d;
            width: 200px;
            padding: 20px;
            box-shadow: 2px 0 4px rgba(0,0,0,0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 10px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #495057;
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex: 1;
        }

        .box-content{
            padding:10px;
        }

        .content {
            flex: 1;
            padding: 3px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 4px;
        }

        .section {
            background-color: #e9ecef;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Footer Styles */
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            margin-top: auto;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="navbar">
                <img src="path/to/logo.png" alt="Logo" class="navbar-logo">
                <div class="navbar-menu">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="main-content">
            <aside>
                <nav>
                    <ul class ="box-content" >
                        <li><a href="/edit-barang">Edit Barang</a></li>
                        <li><a href="/tambah-barang">Tambah Barang</a></li>
                        <li><a href="/hapus-barang">Hapus Barang</a></li>
                        <li><a href="/update-barang">Update Barang</a></li>
                    </ul>
                </nav>
            </aside>

            <div class="content">
                <h2>Welcome to the Dashboard!</h2>
                <p>lo asik bang,asik sendiri tapi</p>

                <div class="section">
                    <h3>Section 1</h3>
                    <p>meranti</p>
                </div>

                <div class="section">
                    <h3>Section 2</h3>
                    <p>bolu</p>
                </div>

                <div class="section">
                    <h3>Section 3</h3>
                    <p>wahyu huhu asek</p>
                </div>
            </div>
        </div>

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
    </div>
</body>
</html>
