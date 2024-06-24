<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/style/tailwindcss3.4.1.js" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <title>Sidebar Responsif Menggunakan TailwindCSS</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-center mb-6">Edit Produk</h1>
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        <form action="{{ route('update_produk', $produk->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')
            <div>
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $produk->nama }}">
            </div>
            <div>
                <label for="merek" class="block text-gray-700 font-bold mb-2">Merek:</label>
                <input type="text" id="merek" name="merek" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $produk->merek }}">
            </div>
            <div>
                <label for="harga" class="block text-gray-700 font-bold mb-2">Harga:</label>
                <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $produk->harga }}">
            </div>
            <div>
                <label for="stok" class="block text-gray-700 font-bold mb-2">Stok:</label>
                <input type="number" id="stok" name="stok" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $produk->stok }}">
            </div>
            <div>
                <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
