<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/style/tailwindcss3.4.1.js" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <title>Responsive Sidebar Using TailwindCSS</title>
  </head>
  <body class="bg-gray-100">
    <h1 class="text-2xl font-semibold text-center my-8">Daftar Produk</h1>
    <div class="max-w-2xl mx-auto">
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        @foreach ($produk as $produk)
            <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="font-bold">{{ $produk->nama }}</span> - {{ $produk->merek }}
                    </div>
                    <form action="{{ route('hapus_produk', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
