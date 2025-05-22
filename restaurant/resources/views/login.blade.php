<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    body, html {
      height: 100%;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .left-side {
      flex: 1;
      background: url('https://images.unsplash.com/photo-1557682250-33bd709cbe85') no-repeat center center/cover;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
      /* border-top-left-radius: 20px;
      border-bottom-left-radius: 20px; */
    }

    .left-side h2 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .left-side p {
      font-size: 18px;
      opacity: 0.9;
    }

    .right-side {
      flex: 1;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 40px;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }

    .right-side h2 {
      font-size: 28px;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .right-side p {
        font-size: 16px;
        font-weight: 600; 
        margin-bottom: 30px;
    }

    .form {
      width: 100%;
      max-width: 300px;
    }

    .form input {
      width: 100%;
      padding: 10px 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .form button {
      width: 100%;
      padding: 12px; 
      background: #000;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .form button:hover {
      background: #444;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left-side, .right-side {
        border-radius: 0;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-side">
      <div>
        <h2>Buat Akun Anda</h2>
        <p>Restaurant Rawr</p>
      </div>
    </div>
    <div class="right-side">
      <h2>Login</h2>
      <p>Silahkan masuk untuk mengakses menu</p>
      <form class="form" method="POST" action="/login">
        @csrf
        <input type="text" name="username" placeholder="Your name" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
