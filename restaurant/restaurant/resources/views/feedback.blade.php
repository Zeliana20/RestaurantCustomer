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
            background: #f4f0eb;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow:
                rgba(50, 50, 93, 0.15) 0px 2px 5px 0px,
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
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.2rem;
            background: linear-gradient(to right, #a05a2c 0%, #7b3f1d 100%);
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
            color: #4b2e1f;
            font-size: 0.95rem;
            font-weight: 400;
            padding: 8px 12px;
            border-radius: 6px;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #f0eae4;
        }

        /* Content */
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px;
            background-color: #e2d8d0;
        }

        .feedback-form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .feedback-form h2 {
            color: #5c3b22;
            margin-bottom: 20px;
        }

        .emoji-buttons {
            display: flex;
            justify-content: space-between;
            margin: 10px 0 20px;
        }

        .emoji-button {
            width: 60px;
            height: 60px;
            font-size: 24px;
            border: 2px solid #a37451; 
            border-radius: 8px;
            cursor: pointer;
            background-color: #6b1616;
            transition: all 0.2s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
        }


        .emoji-button:hover {
            background-color: #f3d7a7;
            border-color: #a37451;
        }

        .emoji-button.selected {
            background-color: #3f1f06;
            color: #fff;
        }

        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin: 10px 0 20px;
            resize: vertical;
            font-family: inherit;
        }

        .feedback-form .follow-up {
            margin-bottom: 20px;
        }

        .feedback-form .actions {
            display: flex;
            gap: 10px;
        }

        .feedback-form button,
        .feedback-form a.cancel-btn {
            flex: 1;
            text-align: center;
            padding: 12px 0;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
        }

        .feedback-form button {
            background-color: #a05a2c;
            color: white;
            border: none;
            cursor: pointer;
        }

        .feedback-form button:hover {
            background-color: #7b3f1d;
        }

        .feedback-form a.cancel-btn {
            background-color: #f3f3f3;
            color: #5c3b22;
            border: 1px solid #ccc;
        }

        .feedback-form a.cancel-btn:hover {
            background-color: #e2d8d0;
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
            <li><a href="{{ route('feedback.form') }}">Feedback</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <form method="POST" action="{{ url('/feedback') }}" class="feedback-form">
            @csrf

            <h2>Feedback</h2>

            @if (session('success'))
                <p style="color: green">{{ session('success') }}</p>
            @endif

            <p>Bagaimana pendapat Anda tentang makanan dan layanan kami ?</p>
            <div class="emoji-buttons" id="emoji-buttons">
                @for ($i = 1; $i <= 5; $i++)
                    <button type="button" class="emoji-button" data-value="{{ $i }}">
                        {!! ['😞', '😐', '🙂', '😀', '😍'][$i - 1] !!}
                    </button>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating" required>

            <label for="comment">Tulis saran atau pesan Anda di sini</label>
            <textarea name="comment" id="comment" rows="4" placeholder="Tulis di sini..."></textarea>

            <div class="follow-up">
                <p>Bolehkan kami menghubungi Anda terkait tanggapan ini?</p>
                <label><input type="radio" name="follow_up" value="1" required> Iya</label>
                <label style="margin-left: 10px;"><input type="radio" name="follow_up" value="0" required> Tidak</label>
            </div>

            <div class="actions">
                <button type="submit">Kirim</button>
                <a href="#" class="cancel-btn">Batal</a>
            </div>
        </form>
    </div>

    <script>
        // Emoji selection logic
        const buttons = document.querySelectorAll('.emoji-button');
        const ratingInput = document.getElementById('rating');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                buttons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                ratingInput.value = button.getAttribute('data-value');
            });
        });
    </script>

</body>

</html>
