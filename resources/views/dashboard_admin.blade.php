<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/style/tailwindcss3.4.1.js" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <title>Responsive Sidebar Using TailwindCSS</title>
  </head>
  <body class=" h-screen bg-white">
    <!-- Navbar -->
    <header class=" shadow py-4 px-6 flex justify-between items-center bg-gray-800">
      <div class="flex items-center">
        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full mr-4" alt="Logo">
        <h1 class="text-2xl text-white font-extrabold ">Admin Dashboard</h1>
      </div>
      <div class="flex items-center space-x-4">
        <a href="#" class="text-white hover:text-blue-500">Profile</a>
        <a href="#" class="text-white hover:text-blue-500">Settings</a>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Log Out</button>
      </div>
    </header>
  
    <div class="flex h-full">
      <!-- Sidebar -->
      <div class="w-64 bg-gray-800 text-white h-full p-4">
        <ul>
        
          <li class="mb-4">
            <a href="/tambah-barang" class="flex items-center p-2 hover:bg-blue-600 rounded">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
              Menambahkan Barang
            </a>
          </li>
          <li class="mb-4">
            <a href="/edit-barang" class="flex items-center p-2 hover:bg-blue-600 rounded">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0H5m4 0h4m-4 0V8m0 4v4"></path></svg>
              Edit Barang
            </a>
          </li>
          <li class="mb-4">
            <a href="/hapus-barang" class="flex items-center p-2 hover:bg-blue-600 rounded">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
              Hapus Barang
            </a>
          </li>
          <li class="mb-4">
            <a href="/update-barang" class="flex items-center p-2 hover:bg-blue-600 rounded">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zm0 4c2.761 0 5 2.239 5 5v4H7v-4c0-2.761 2.239-5 5-5z"></path></svg>
              Stok
            </a>
          </li>
        </ul>
      </div>
  
      <!-- Main content -->
      <div class="flex-1 p-6">
        <!-- Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Card 1 -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Total Users</h3>
            <p class="text-2xl">1,234</p>
          </div>
  
          <!-- Card 2 -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Total Sales</h3>
            <p class="text-2xl">$12,345</p>
          </div>
  
          <!-- Card 3 -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">New Orders</h3>
            <p class="text-2xl">567</p>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>