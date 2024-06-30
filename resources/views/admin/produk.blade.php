<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/style/tailwindcss3.4.1.js" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <title>Admin</title>
</head>
<body class="h-screen bg-white flex flex-col">
    <!-- Navbar -->
    <header class="shadow-lg py-4 px-6 flex justify-between items-center bg-gray-900 shadow">
        <div class="flex items-center">
            <h1 class="text-2xl text-white font-extrabold">Admin Dashboard</h1>
        </div>
        <div class="flex items-center space-x-4">

            <a href="#" class="text-white hover:text-blue-500">Settings</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Log Out</button>
            </form>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col p-4 h-full">
            <ul>
                <li class="mb-4">
                    <a href="{{route('index_produk')}}" class="flex items-center p-2 hover:bg-blue-600 rounded">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h3M9 6h12M3 12h3M9 12h12M3 18h3M9 18h12" />
                        </svg>
                        Produk
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{route('index_merek')}}" class="flex items-center p-2 hover:bg-blue-600 rounded">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h3M9 6h12M3 12h3M9 12h12M3 18h3M9 18h12" />
                        </svg>
                        Merek
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-2 my-10 p-6 rounded shadow-xl w-full max-w-screen-lg mx-10 overflow-auto">
            @if(session()->has('success'))
                <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-6" role="alert">
                    <p class="font-bold">Success</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mb-6" role="alert">
                    <p class="font-bold">Error</p>
                    <p class="text-sm">{{ session('error')}}</p>
                    @if(session()->has('errorMessages'))
                        <ul class="mt-2 list-disc list-inside text-red-700">
                            @foreach (session('errorMessages') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif

            <!-- Daftar Produk-->
            <div class="mb-6">
                <button id="btnTambah" class="bg-green-500 text-white py-3 px-5 rounded text-sm">Tambah Produk</button>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Merek</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Harga</th>
                        <th class="border px-4 py-2">Stok</th>
                        <th class="border px-4 py-2">Gambar</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item['merek']['nama_merek'] ?? '' }}</td>
                            <td class="border px-4 py-2">{{ $item['nama'] ?? '' }}</td>
                            <td class="border px-4 py-2">{{ $item['deskripsi'] ?? '' }}</td>
                            <td class="border px-4 py-2">{{ $item['harga'] ?? '' }}</td>
                            <td class="border px-4 py-2">{{ $item['stok'] ?? '' }}</td>
                            <td class="border px-4 py-2">
                                <div class="justify-center flex">
                                    <img src="{{ asset('storage/'.$item['gambar']) }}" class="w-16 h-16 object-cover rounded-full">
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2 justify-center">
                                    <a href="#" class="bg-yellow-500 text-white py-1 px-3 rounded text-sm btnEdit"
                                    data-id="{{ $item['id'] ?? '' }}"
                                    data-merek="{{ $item['id_merek'] ?? '' }}"
                                    data-nama="{{ $item['nama'] ?? '' }}"
                                    data-deskripsi="{{ $item['deskripsi'] ?? '' }}"
                                    data-harga="{{ $item['harga'] ?? '' }}"
                                    data-stok="{{ $item['stok'] ?? '' }}"
                                    data-gambar="{{ asset('storage/'.$item['gambar']) ?? '' }}">Edit</a>
                                    <form action="{{ route('produk.delete', $item['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tambah produk -->
    <div id="formTambah" class="fixed inset-0 bg-gray-100 bg-opacity-75 flex items-center justify-center hidden">
        <div class="max-w-md w-full h-full bg-white p-8 rounded-lg shadow-lg overflow-y-auto">
            <h2 class="text-2xl mb-4">Tambah Barang</h2>
            <form action="" method="POST" enctype="multipart/form-data" id="form-tambah" class="space-y-4">
                @csrf
                <div>
                    <label for="id_merek" class="block text-sm font-medium text-gray-700">Merek:</label>
                    <select id="id_merek" name="id_merek" value="{{ isset($data['id_merek'])?$data['id_merek']:old('id_merek')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach($merek as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_merek }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Series:</label>
                    <input type="text" id="nama" name="nama" value="{{ isset($data['nama'])?$data['nama']:old('nama')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="text" id="harga" name="harga" value="{{ isset($data['harga'])?$data['harga']:old('harga')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700">Jumlah Stok:</label>
                    <input type="number" id="stok" name="stok" value="{{ isset($data['stok'])?$data['stok']:old('stok')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" value="{{ isset($data['deskripsi'])?$data['deskripsi']:old('deskripsi')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" value="{{ isset($data['gambar'])?$data['gambar']:old('gambar')}}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="btnCancel" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Edit Produk -->
    <div id="formEdit" class="fixed inset-0 bg-gray-100 bg-opacity-75 flex items-center justify-center hidden">
        <div class="max-w-md w-full h-full bg-white p-8 rounded-lg shadow-lg overflow-y-auto">
            <h2 class="text-2xl mb-4">Edit Produk</h2>
            <form method="POST" enctype="multipart/form-data" id="form-edit" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div>
                    <label for="edit_id_merek" class="block text-sm font-medium text-gray-700">Merek:</label>
                    <select id="edit_id_merek" name="id_merek" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @foreach($merek as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_merek }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="edit_nama" class="block text-sm font-medium text-gray-700">Series:</label>
                    <input type="text" id="edit_nama" name="nama" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="edit_harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="text" id="edit_harga" name="harga" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="edit_stok" class="block text-sm font-medium text-gray-700">Jumlah Stok:</label>
                    <input type="number" id="edit_stok" name="stok" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                    <textarea id="edit_deskripsi" name="deskripsi" rows="4" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div>
                    <label for="edit_gambar" class="block text-sm font-medium text-gray-700">Gambar:</label>
                    <input type="file" id="edit_gambar" name="gambar" accept="image/*" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <img id="edit_gambar_preview" src="" class="w-16 h-16 object-cover rounded mt-2">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="btnCancelEdit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btnTambah').addEventListener('click', function() {
            document.getElementById('formTambah').classList.remove('hidden');
        });

        document.getElementById('btnCancel').addEventListener('click', function() {
            document.getElementById('formTambah').classList.add('hidden');
        });

        document.querySelectorAll('.btnEdit').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var merekId = this.getAttribute('data-merek');
                var nama = this.getAttribute('data-nama');
                var deskripsi = this.getAttribute('data-deskripsi');
                var harga = this.getAttribute('data-harga');
                var stok = this.getAttribute('data-stok');
                var gambar = this.getAttribute('data-gambar');

                document.getElementById('edit_id').value = id;
                document.getElementById('edit_id_merek').value = merekId;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_deskripsi').value = deskripsi;
                document.getElementById('edit_harga').value = harga;
                document.getElementById('edit_stok').value = stok;
                document.getElementById('edit_gambar_preview').src = gambar;

                var formEdit = document.getElementById('form-edit');
                formEdit.action = "/admin/produk/" + id;

                document.getElementById('formEdit').classList.remove('hidden');
            });
        });

        document.getElementById('btnCancelEdit').addEventListener('click', function() {
            document.getElementById('formEdit').classList.add('hidden');
        });
    </script>
</body>
</html>
