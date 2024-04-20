<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button-container {
            text-align: right;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .notification {
            margin-top: 10px;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border-radius: 4px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Barang</h2>
        <form action="#" method="POST" enctype="multipart/form-data" id="form-tambah">
            <label for="nama">Nama Barang:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="merek">Merek:</label>
            <input type="text" id="merek" name="merek" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>

            <label for="stok">Jumlah Stok:</label>
            <input type="number" id="stok" name="stok" required>

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <div class="button-container">
                <button type="submit">Simpan</button>
            </div>
        </form>

        <div class="notification" id="notif-sukses">Barang berhasil disimpan!</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form-tambah').addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                // Implementasi logika penyimpanan barang di sini (gunakan AJAX atau sesuaikan dengan backend Anda)
                // Contoh notifikasi:
                document.getElementById('notif-sukses').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('notif-sukses').style.display = 'none';
                }, 3000); // Sembunyikan notifikasi setelah 3 detik
            });
        });
    </script>
</body>
</html>
