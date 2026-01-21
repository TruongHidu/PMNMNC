<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Tổng thể trang */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* Trang trí Bảng */
        table {
            width: 100%;
            border-collapse: collapse; /* Loại bỏ khoảng cách giữa các viền */
            margin-bottom: 1.5rem;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f5f5f5; /* Hiệu ứng dòng khi di chuột qua */
        }

        /* Trang trí Nút bấm (Thẻ a) */
        .btn-create {
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .btn-create:hover {
            background-color: #0056b3;
        }

        .actions {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Product Management</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>iPhone 15 Pro</td>
                <td>$999</td>
            </tr>
            <tr>
                <td>2</td>
                <td>MacBook Air M2</td>
                <td>$1,199</td>
            </tr>
        </tbody>
    </table>

    <div class="actions">
        <a href="{{ route('product.create') }}" class="btn-create">Add New Product</a>
    </div>
</div>

</body>
</html>