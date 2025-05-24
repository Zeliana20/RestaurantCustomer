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
    }

    .logo {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .logo img {
      height: 30px;
      width: auto;
      margin-right: 10px;
    }

    .logo h1 {
      font-size: 1.2rem;
      background: linear-gradient(to right, #b927fc 0%, #2c64fc 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      margin-bottom: 20px;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #000;
      font-size: 0.95rem;
      font-weight: 400;
      padding: 8px 12px;
      border-radius: 6px;
      display: block;
      transition: background-color 0.3s;
    }

    .sidebar ul li a:hover {
      background-color: #f0f0f0;
    }

    /* Content */
    .content {
      margin-left: 250px;
      padding: 30px;
      width: calc(100% - 250px);
    }

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">
      <img src="assets/Logo64x64.png" alt="logo" />
      <h1>Restaurant</h1>
    </div>
    <ul>
      <li><a href="{{ route('dashboard') }}">Home</a></li>
      <li><a href="#">Menu and Order</a></li>
      <li><a href="{{ route('reservation.form') }}">Reservation</a></li>
      <li><a href="{{ route('feedback.form')}}">Feedback</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h2>Welcome to Dashboard</h2>
    <p>Ini konten halaman dashboard kamu.</p>
  </div>

</body>
</html>
