<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Poppins", sans-serif;
            background-color: #faf8f5;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow: rgba(139, 113, 93, 0.15) 0px 2px 5px 0px,
                rgba(101, 67, 33, 0.05) 0px 1px 3px 0px;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e8ddd4;
        }

        .logo img {
            height: 30px;
            width: auto;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.2rem;
            font-weight: 600;
            background: linear-gradient(to right, #8b5a3c 0%, #d4a574 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin-bottom: 8px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #654321;
            font-size: 0.95rem;
            font-weight: 400;
            padding: 12px 16px;
            border-radius: 8px;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #f5f0e8;
            color: #8b5a3c;
            transform: translateX(5px);
        }

        .sidebar ul li a.active {
            background: linear-gradient(135deg, #8b5a3c 0%, #d4a574 100%);
            color: white;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-color: #fff7f0;
        }


        .container {
            padding: 40px;
            background-color: #fff7f0;
            border-radius: 12px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 4px 12px rgba(139, 90, 60, 0.1);
            color: #4e342e;
        }

        .container h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #5d4037;
            border-bottom: 2px solid #d7ccc8;
            padding-bottom: 10px;
        }

        .container p {
            margin-bottom: 15px;
            font-weight: 500;
        }

        label {
            display: block;
            margin-bottom: 10px;
            background-color: #fcefe6;
            padding: 12px 18px;
            border-radius: 8px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            color: #6d4c41;
            font-weight: 500;
        }

        input[type="radio"] {
            margin-right: 12px;
            transform: scale(1.2);
        }

        input[type="radio"]:checked+label,
        label:hover {
            background-color: #efebe9;
            border-color: #8d6e63;
            color: #4e342e;
        }

        button[type="submit"] {
            padding: 12px 24px;
            background: linear-gradient(135deg, #8b5a3c 0%, #d4a574 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #7b4b2d 0%, #c99463 100%);
        }


        /* Main Content Styles */
        .payment-buttons {
            display: flex;
            gap: 16px;
            margin-top: 10px;
        }

        .payment-btn {
            padding: 12px 24px;
            background-color: #fcefe6;
            border: 2px solid transparent;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            color: #6d4c41;
            transition: all 0.3s ease;
        }

        .payment-btn:hover {
            background-color: #efebe9;
            border-color: #a1887f;
        }

        .payment-btn.selected {
            background: linear-gradient(135deg, #8b5a3c 0%, #d4a574 100%);
            color: white;
            border-color: #8b5a3c;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>Restaurant</h1>
        </div>
        <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li>
            <li><a href="{{ route('reservation.form') }}">Reservation</a></li>
            <li><a href="{{ route('feedback.form') }}">Feedback</a></li>
            <li><a href="{{ route('payment.form') }}">Pembayaran</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
        </nav>
    </div>

    <!-- Tambahkan di <body> bagian Main Content -->
    <div class="main-content">
        <div class="container">
            <h2>Halaman Pembayaran</h2>

            @if (session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('payment.confirm') }}">
                @csrf

                <p><strong>Waktu Transaksi:</strong> {{ $timestamp }}</p>
                <p>Pilih metode pembayaran:</p>

                <div class="payment-buttons">
                    <button type="button" class="payment-btn" data-method="cash">Cash</button>
                    <button type="button" class="payment-btn" data-method="qris">QRIS</button>
                </div>

                <!-- Hidden input untuk menyimpan metode pembayaran yang dipilih -->
                <input type="hidden" name="payment_method" id="payment_method" value="">

                <!-- QRIS Dummy Image -->
                <div id="qris-image-container" style="display: none; text-align: center; margin-top: 20px;">
                    <img src="assets/contohQris.png" alt="QR Code Dummy" style="max-width: 300px; width: 100%;" />
                </div>

                <br>
                <button type="submit">Sudah Bayar</button>
            </form>
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('.payment-btn');
        const hiddenInput = document.getElementById('payment_method');
        const qrisImage = document.getElementById('qris-image-container');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Reset button styles
                buttons.forEach(btn => btn.classList.remove('selected'));

                // Tambahkan class selected ke tombol yang diklik
                button.classList.add('selected');

                // Set nilai ke input hidden
                hiddenInput.value = button.dataset.method;

                // Tampilkan QRIS jika dipilih
                if (button.dataset.method === 'qris') {
                    qrisImage.style.display = 'block';
                } else {
                    qrisImage.style.display = 'none';
                }
            });
        });
    </script>


</body>

</html>
