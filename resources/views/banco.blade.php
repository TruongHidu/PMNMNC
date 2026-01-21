<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn Cờ Phóng To</title>
    <style>
        body {
            display: flex;
            justify-content: center; /* Căn giữa ngang */
            align-items: center;    /* Căn giữa dọc */
            min-height: 100vh;      /* Chiều cao toàn màn hình */
            margin: 0;
            background-color: #f0f0f0;
        }

        table {
            border: 2px solid #333;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2); /* Đổ bóng cho đẹp */
        }

        td {
            /* Tăng kích thước ở đây để phóng to */
            width: 80px; 
            height: 80px;
        }
    </style>
</head>
<body>

    <table border="1" style="border-collapse: collapse;">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    <td style="background-color: {{ ($i + $j) % 2 == 0 ? 'white' : 'black' }};"></td>
                @endfor
            </tr>
        @endfor
    </table>

</body>
</html>