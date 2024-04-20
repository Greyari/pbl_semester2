<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Edit Barang</h1>
    <form action="" method="POST">
        @csrf
        @method('PATCH')
        <label for="nama">Nama Barang:</label>
        <input type="text" id="nama" name="nama" value="">

        <label for="merek">Merek:</label>
        <input type="text" id="merek" name="merek" value="">

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="">

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="">

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
