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
  <body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl mb-4">Update Barang</h2>
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Barang:</label>
                <input type="text" id="nama" name="nama" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="Nama Barang">
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                <input type="number" id="stok" name="stok" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="100">
            </div>
            <div>
                <label for="merek" class="block text-sm font-medium text-gray-700">Merek:</label>
                <input type="text" id="merek" name="merek" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="Merek Barang">
            </div>
            <!-- Tambahkan input untuk atribut lainnya sesuai kebutuhan -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
