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
            padding: 100px;
            max-width: 1200px;
            margin: auto;
            font-family: Arial, sans-serif;
            margin-left: 200px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            padding: 40px;
            gap: 20px;
            justify-content: center;
        }

        .menu-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(25% - 20px);
            /* 4 menu per baris */
            text-align: center;
            transition: transform 0.3s;
        }

        @media (max-width: 1024px) {
            .menu-card {
                width: calc(33.333% - 20px);
                /* 3 per baris di tablet */
            }
        }

        @media (max-width: 768px) {
            .menu-card {
                width: calc(50% - 20px);
                /* 2 per baris di hp */
            }
        }

        @media (max-width: 480px) {
            .menu-card {
                width: 100%;
                /* 1 per baris untuk layar kecil banget */
            }
        }


        .menu-card:hover {
            transform: translateY(-5px);
        }

        .menu-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .menu-name {
            font-size: 18px;
            margin: 15px 0 5px;
            color: #333;
        }

        .menu-price {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
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
        <h2>Menu</h2>
        <div class="menu-container">
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>

            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
            <div class="menu-card">
                <img src="assets/food.png" alt="Menu Image">
                <h4 class="menu-name">Nama Menu</h4>
                <p class="menu-price">Rp XX.XXX</p>
            </div>
        </div>
    </div>



</body>

</html>
