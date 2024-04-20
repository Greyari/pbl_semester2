<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .item-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
        }

        .item-actions {
            display: flex;
            align-items: center;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Daftar Barang</h1>
    <div class="item">
        <div class="item-content">
            <div class="item-details">
                <span class="item-name">Barang 1</span> - Merek 1
            </div>
            <div class="item-actions">
                <button class="btn-delete">Hapus</button>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="item-content">
            <div class="item-details">
                <span class="item-name">Barang 2</span> - Merek 2
            </div>
            <div class="item-actions">
                <button class="btn-delete">Hapus</button>
            </div>
        </div>
    </div>
    <!-- Tambahkan item sesuai kebutuhan -->
</body>
</html>
