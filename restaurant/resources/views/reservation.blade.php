<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        /* Sidebar Style */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow: rgba(50, 50, 93, 0.15) 0px 2px 5px 0px,
                rgba(0, 0, 0, 0.05) 0px 1px 3px 0px;
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
            border-bottom: 1px solid #e0e0e0;
        }

        .logo img {
            height: 30px;
            width: auto;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.2rem;
            font-weight: 600;
            background: linear-gradient(to right, #b58029 0%, #d6a163 100%);
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
            color: #333;
            font-size: 0.95rem;
            font-weight: 400;
            padding: 12px 16px;
            border-radius: 8px;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #f0f0f0;
            color: #f45e01;
            transform: translateX(5px);
        }

        .sidebar ul li a.active {
            background: linear-gradient(135deg, #b58029 0%, #d6a163 100%);
            color: white;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
            background-color: #e2d8d0;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: "Poppins", sans-serif;
            font-size: 0.95rem;
        }

        .floating-button {
            background: linear-gradient(135deg, #8b5a3c, #d4a574);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .floating-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>Restaurant</h1>
        </div>
        <ul>
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li>
            <li><a href="{{ route('reservation.form') }}">Reservation</a></li>
            <li><a href="{{ route('feedback.form') }}">Feedback</a></li>
            <li><a href="{{ route('payment.form') }}">Pembayaran</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2 style="text-align: center; font-weight: 600; margin-bottom: 10px;">Reservasi</h2>
        <p style="text-align: center; margin-bottom: 30px;">
            Silakan isi data reservasi, dan kami akan menyambut Anda dengan hangat
        </p>

        <form style="max-width: 800px; margin: 0 auto; display: grid; gap: 20px;">
            @csrf
            <div>
                <label>Nama</label>
                <input type="text" class="form-input" placeholder="Nama Lengkap">
            </div>
            <div>
                <label>Tanggal Reservasi</label>
                <input type="date" class="form-input">
            </div>
            <div>
                <label>Waktu </label>
                <input type="time" class="form-input">
            </div>
            <div>
                <label>Jumlah Tamu</label>
                <input type="text" class="form-input" placeholder="Jumlah Orang">
            </div>
            <div>
                <label>Alamat Email</label>
                <input type="email" class="form-input" placeholder="Masukkan Alamat Email">
            </div>
            <div>
                <label>Nomor Telepon</label>
                <input type="tel" class="form-input">
            </div>

            <div style="grid-column: 1 / -1;">
                <label>Catatan</label>
                <textarea class="form-input" rows="4" placeholder="Catatan Tambahan (opsional)..." maxlength="1000"></textarea>
            </div>

            <div style="grid-column: 1 / -1; text-align: center;">
                <button class="floating-button" type="submit">Pesan Sekarang</button>
            </div>


    </div>
    </form>
    </div>


</body>

</html>
