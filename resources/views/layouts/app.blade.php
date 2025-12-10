<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Afriza')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ------------------------------- GLOBAL ------------------------------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #e2e8f0;
            overflow-x: hidden;

            /* Cyberpunk Neon Gradient */
            background: radial-gradient(circle at top, #0d1226, #070b1a, #04050f);
        }

        /* Particle Background Canvas */
        #particles {
            position: fixed;
            top: 0; left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background: transparent;
        }

        /* ------------------------------- NAVBAR ------------------------------- */
        header {
            background: rgba(0, 0, 20, 0.45);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(0, 255, 255, 0.25);
            box-shadow: 0 0 25px rgba(0, 200, 255, 0.25);

            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 20px;
        }

        .logo {
            font-size: 24px;
            color: #38bdf8;
            text-shadow: 0 0 12px #0ea5e9;
            text-decoration: none;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 500;
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .nav-links a:hover {
            color: #38bdf8;
            border-color: rgba(56,189,248,0.4);
            box-shadow: 0 0 12px rgba(56,189,248,0.5);
        }

        .nav-links a.active {
            background: rgba(56, 189, 248, 0.15);
            border-color: rgba(56,189,248,0.5);
            box-shadow: 0 0 15px rgba(56,189,248,0.45);
        }

        /* ------------------------------- MAIN ------------------------------- */
        main {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
            min-height: 70vh;
        }

        .card {
            background: rgba(255,255,255,0.06);
            padding: 35px;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(12px);
            box-shadow: 0 0 20px rgba(0,255,255,0.08);
            margin-bottom: 25px;
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 0 35px rgba(0,255,255,0.18);
            transform: translateY(-3px);
        }

        h1, h2 {
            color: #38bdf8;
            text-shadow: 0 0 10px rgba(56,189,248,0.6);
        }

        p, li {
            color: #cbd5e1;
        }

        .skill-tag {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            background: rgba(0,255,255,0.1);
            border: 1px solid rgba(0,255,255,0.25);
            margin: 5px;
            font-size: 13px;
            color: #38bdf8;
            box-shadow: 0 0 10px rgba(56,189,248,0.2);
        }

        /* ------------------------------- FOOTER ------------------------------- */
        footer {
            text-align: center;
            padding: 25px;
            margin-top: 60px;
            background: rgba(0,0,0,0.35);
            border-top: 1px solid rgba(0,255,255,0.2);
            box-shadow: 0 0 25px rgba(0,255,255,0.25);
        }

        footer p {
            color: #94a3b8;
            text-shadow: 0 0 8px rgba(0,255,255,0.25);
        }

    </style>
</head>

<body>

    <!-- Particle Canvas -->
    <canvas id="particles"></canvas>

    <!-- Header -->
    <header>
        <nav>
            <a href="{{ route('dashboard') }}" class="logo">AFRIZAHIDAYAT</a>

            <ul class="nav-links">

                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>

                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>

                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>

                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2025 Muhammad Afriza Hidayat • Dashboard Futuristik Neon Cyberpunk</p>
    </footer>

    <!-- PARTICLE ANIMATION SCRIPT -->
    <script>
        const canvas = document.getElementById("particles");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];

        // Generate particles
        for (let i = 0; i < 80; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 2 + 1,
                speedX: (Math.random() - 0.5) * 0.8,
                speedY: (Math.random() - 0.5) * 0.8
            });
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(p => {
                // Move
                p.x += p.speedX;
                p.y += p.speedY;

                // Bounce
                if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
                if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;

                // Draw
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = "rgba(56, 189, 248, 0.8)";
                ctx.shadowBlur = 10;
                ctx.shadowColor = "#38bdf8";
                ctx.fill();
            });

            requestAnimationFrame(animateParticles);
        }

        animateParticles();
    </script>

</body>
</html>
