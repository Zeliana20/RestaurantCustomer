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

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .homepage {
            width: 100%;
            height: 75vh;
            position: relative;
            overflow: hidden;
        }

        .homepage-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .homepage-title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.5rem;
            font-weight: 600;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            text-align: center;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.3);
            padding: 20px 40px;
            border-radius: 15px;
            backdrop-filter: blur(5px);
        }

        /* Content Section Styles */
        .content-section {
            padding: 40px;
            background-color: #fff;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #654321;
            margin-bottom: 10px;
        }

        .section-header p {
            font-size: 1.1rem;
            color: #8b7355;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Carousel Styles */
        .carousel-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 80px;
            overflow: hidden;
        }

        .carousel-wrapper {
            display: flex;
            gap: 30px;
            transition: transform 0.5s ease;
            padding: 20px 0;
            justify-content: center;
        }

        .carousel-item {
            width: 350px;
            flex-shrink: 0;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(139, 90, 60, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .carousel-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(139, 90, 60, 0.2);
        }

        .carousel-item-image {
            width: 100%;
            height: 280px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
        }

        .carousel-item-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(101,67,33,0.3), rgba(139,90,60,0.1));
            z-index: 1;
        }

        .carousel-item.promo .carousel-item-image {
            background-image: linear-gradient(135deg, rgba(139,90,60,0.9), rgba(160,82,45,0.9)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect width="400" height="300" fill="%238b5a3c"/><text x="200" y="150" font-family="Arial" font-size="60" fill="white" text-anchor="middle" dominant-baseline="middle">🍕</text></svg>');
        }

        .carousel-item.menu .carousel-item-image {
            background-image: linear-gradient(135deg, rgba(160,140,88,0.9), rgba(184,134,11,0.9)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect width="400" height="300" fill="%23a08c58"/><text x="200" y="150" font-family="Arial" font-size="60" fill="white" text-anchor="middle" dominant-baseline="middle">🍽️</text></svg>');
        }

        .carousel-item.special .carousel-item-image {
            background-image: linear-gradient(135deg, rgba(212,165,116,0.9), rgba(205,133,63,0.9)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect width="400" height="300" fill="%23d4a574"/><text x="200" y="150" font-family="Arial" font-size="60" fill="white" text-anchor="middle" dominant-baseline="middle">⭐</text></svg>');
        }

        .promo-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #a0522d;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .carousel-item-content {
            padding: 30px;
            text-align: left;
        }

        .carousel-item h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #654321;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .carousel-item .date {
            font-size: 0.9rem;
            color: #8b7355;
            margin-bottom: 15px;
        }

        .carousel-item p {
            font-size: 1rem;
            color: #8b7355;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .carousel-btn {
            background: linear-gradient(135deg, #8b5a3c, #d4a574);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .carousel-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(139, 90, 60, 0.3);
        }

        /* Carousel Navigation */
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            color: #654321;
            font-size: 1.8rem;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(139, 90, 60, 0.15);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-nav:hover {
            background: #8b5a3c;
            color: white;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(139, 90, 60, 0.3);
        }

        .carousel-nav.prev {
            left: 20px;
        }

        .carousel-nav.next {
            right: 20px;
        }

        /* Carousel Dots */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 40px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(139, 90, 60, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: #8b5a3c;
            transform: scale(1.3);
        }

        .dot:hover {
            background: #d4a574;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .homepage-title {
                font-size: 1.8rem;
                padding: 15px 25px;
            }
        }

        /* Loading Animation */
        .homepage-image {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Homepage Hero Section -->
        <div class="homepage">
            <img src="assets/homepage.png" alt="Restaurant Interior" class="homepage-image" />
            <div class="homepage-title">
                Selamat Datang di Restaurant Kami
            </div>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <!-- Section Header -->
            <div class="section-header">
                <h2>Penawaran Spesial & Menu Terbaru</h2>
                <p>Jelajahi promo menarik dan cicipi menu-menu terbaru yang telah kami siapkan khusus untuk Anda</p>
            </div>

            <!-- Carousel -->
            <div class="carousel-container">
                <div class="carousel-wrapper" id="carouselWrapper">
                    <!-- Promo Slide -->
                    <div class="carousel-item promo">
                        <div class="carousel-item-image">
                            <div class="promo-badge">25% OFF</div>
                        </div>
                        <div class="carousel-item-content">
                            <h3>Weekend Special Promo</h3>
                            <div class="date">Valid until Sun, 26 May 2025</div>
                            <p>Nikmati diskon 25% untuk semua menu pasta dan pizza setiap akhir pekan. Promo berlaku untuk dine-in dan takeaway.</p>
                            <button class="carousel-btn">Pesan Sekarang</button>
                        </div>
                    </div>

                    <!-- New Menu Slide -->
                    <div class="carousel-item menu">
                        <div class="carousel-item-image">
                            <div class="promo-badge">NEW</div>
                        </div>
                        <div class="carousel-item-content">
                            <h3>Fusion Delight Collection</h3>
                            <div class="date">Available from Mon, 25 May 2025</div>
                            <p>Koleksi menu terbaru dengan perpaduan cita rasa Asia dan Eropa. Dipersembahkan oleh chef berpengalaman internasional.</p>
                            <button class="carousel-btn">Lihat Menu</button>
                        </div>
                    </div>

                    <!-- Special Event Slide -->
                    <div class="carousel-item special">
                        <div class="carousel-item-image">
                            <div class="promo-badge">LIMITED</div>
                        </div>
                        <div class="carousel-item-content">
                            <h3>Chef's Table Experience</h3>
                            <div class="date">Every Fri & Sat Evening</div>
                            <p>Pengalaman kuliner eksklusif dengan menu degustasi 7 course yang dipersembahkan langsung oleh head chef kami.</p>
                            <button class="carousel-btn">Reservasi</button>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button class="carousel-nav prev" onclick="prevSlide()">&#8249;</button>
                <button class="carousel-nav next" onclick="nextSlide()">&#8250;</button>
            </div>

            <!-- Carousel Dots -->
            <div class="carousel-dots">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </div>

    <script>
        // Carousel functionality
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.dot');
        const carouselWrapper = document.getElementById('carouselWrapper');

        function updateCarousel() {
            const slideWidth = 350; // card width
            const gap = 30; // gap between cards
            const totalWidth = slideWidth + gap;
            const containerWidth = carouselWrapper.parentElement.offsetWidth;
            const visibleCards = Math.floor((containerWidth - 160) / totalWidth); // 160 for navigation padding
            
            // Center the carousel by calculating offset
            const totalCarouselWidth = slides.length * totalWidth - gap;
            const availableWidth = containerWidth - 160;
            const offset = Math.max(0, (availableWidth - totalCarouselWidth) / 2);
            
            // Calculate transform position
            const transformX = offset - (currentSlideIndex * totalWidth);
            carouselWrapper.style.transform = `translateX(${transformX}px)`;
            
            // Update dots
            dots.forEach(dot => dot.classList.remove('active'));
            if (dots[currentSlideIndex]) {
                dots[currentSlideIndex].classList.add('active');
            }
        }

        function showSlide(index) {
            currentSlideIndex = index;
            updateCarousel();
        }

        function nextSlide() {
            const nextIndex = (currentSlideIndex + 1) % slides.length;
            showSlide(nextIndex);
        }

        function prevSlide() {
            const prevIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
            showSlide(prevIndex);
        }

        function currentSlide(index) {
            showSlide(index - 1);
        }

        // Initialize carousel on page load
        window.addEventListener('load', updateCarousel);
        window.addEventListener('resize', updateCarousel);

        // Auto-play carousel
        // setInterval(nextSlide, 6000);

        // Sidebar navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
            
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    sidebarLinks.forEach(l => l.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>