<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
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

        input[type="text"], input[type="number"] {
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Barang</h2>
        <form action="#" method="POST">
            <label for="nama">Nama Barang:</label>
            <input type="text" id="nama" name="nama" value="Nama Barang">

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="100">

            <label for="merek">Merek:</label>
            <input type="text" id="merek" name="merek" value="Merek Barang">

            <!-- Tambahkan input untuk atribut lainnya sesuai kebutuhan -->

            <div class="button-container">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
