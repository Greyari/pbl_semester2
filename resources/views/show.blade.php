<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
</head>
<body>
    <h1>Detail Barang</h1>
    <p>ID Barang: {{ $barang->id }}</p>
    <p>Nama Barang: {{ $barang->nama }}</p>
    <p>Harga: {{ $barang->harga }}</p>
    <!-- Tambahkan detail barang lainnya sesuai kebutuhan -->
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>
