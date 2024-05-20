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
  <body class="bg-gray-100">
    <h1 class="text-2xl font-semibold text-center my-8">Daftar Barang</h1>
    <div class="max-w-2xl mx-auto">
        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <span class="font-bold">Barang 1</span> - Merek 1
                </div>
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Hapus</button>
            </div>
        </div>
        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <span class="font-bold">Barang 2</span> - Merek 2
                </div>
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Hapus</button>
            </div>
        </div>
        <!-- Tambahkan item sesuai kebutuhan -->
    </div>
</body>
</html>
