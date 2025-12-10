<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Futuristik</title>

    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0f1f, #0f172a, #1e293b);
            min-height: 100vh;
            color: #e2e8f0;
        }

        /* NAVBAR FUTURISTIK */
        .navbar {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(12px);
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
            box-shadow: 0 0 20px rgba(0, 200, 255, 0.15);
        }

        .navbar h2 {
            color: #38bdf8;
            font-size: 24px;
            font-weight: 700;
            text-shadow: 0 0 12px #0ea5e9;
        }

        .nav-links a {
            margin-left: 25px;
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #38bdf8;
            text-shadow: 0 0 10px #38bdf8;
        }

        /* QUICK SHORTCUTS FUTURISTIK */
        .shortcut-container {
            max-width: 1100px;
            margin: 25px auto 10px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 18px;
            padding: 0 20px;
        }

        .shortcut-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 16px;
            cursor: pointer;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: 0.3s;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .shortcut-card:hover {
            transform: translateY(-5px) scale(1.02);
            border-color: #38bdf8;
            box-shadow: 0 0 18px rgba(56,189,248,0.35);
        }

        .shortcut-card::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(120deg, #38bdf8, transparent, #0ea5e9);
            opacity: 0;
            transition: 0.35s;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        .shortcut-card:hover::after {
            opacity: 1;
        }

        .shortcut-title {
            font-size: 17px;
            font-weight: 600;
            color: #e2e8f0;
        }

        /* ICON BULAT FUTURISTIK */
        .shortcut-icon {
            width: 46px;
            height: 46px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: rgba(56,189,248,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #38bdf8;
            backdrop-filter: blur(6px);
            box-shadow: 0 0 12px rgba(56,189,248,0.35);
        }

        /* CONTENT BOX */
        .box {
            max-width: 1100px;
            margin: 25px auto 40px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 18px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 25px rgba(0, 200, 255, 0.1);
            text-align: center;
        }

        .box h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .box p {
            color: #94a3b8;
            font-size: 17px;
            margin-bottom: 30px;
        }

        /* GRID CARD STATISTIC */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 25px;
        }

        .stat-card {
            padding: 25px;
            background: rgba(255,255,255,0.05);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
            cursor: pointer;
            transition: 0.35s;
            backdrop-filter: blur(8px);
            overflow: hidden;
            position: relative;
        }

        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);
            border-color: rgba(56,189,248,0.5);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(120deg, #38bdf8, transparent, #0ea5e9);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: 0.4s;
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .value {
            font-size: 36px;
            font-weight: 700;
            margin-top: 10px;
        }

        .label {
            font-size: 15px;
            color: #cbd5e1;
        }

        .blue .value { color: #38bdf8; }
        .green .value { color: #4ade80; }
        .orange .value { color: #fbbf24; }
        .red .value { color: #fb7185; }

        /* BUTTON LOGOUT */
        .btn-red {
            padding: 12px 25px;
            border-radius: 10px;
            background: linear-gradient(120deg, #ef4444, #dc2626);
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 35px;
            transition: 0.3s;
            box-shadow: 0 0 15px rgba(239,68,68,0.35);
        }

        .btn-red:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(239,68,68,0.55);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h2>Dashboard</h2>

        <div class="nav-links">
            <a href="/home">Home</a>
            <a onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">Logout</a>
        </div>
    </div>

    <!-- ✅ QUICK SHORTCUTS FUTURISTIK -->
    <div class="shortcut-container">

        <div class="shortcut-card" onclick="window.location='/products'">
            <div class="shortcut-icon">📦</div>
            <div class="shortcut-title">Produk</div>
        </div>

        <div class="shortcut-card" onclick="window.location='/toko'">
            <div class="shortcut-icon">🏪</div>
            <div class="shortcut-title">Kelola Toko</div>
        </div>

        <div class="shortcut-card" onclick="window.location='/stok'">
            <div class="shortcut-icon">📊</div>
            <div class="shortcut-title">Cek Stok</div>
        </div>

    </div>

    <!-- CONTENT BOX -->
    <div class="box">
        <h2>Selamat Datang ⚡</h2>
        <p>Halo, <strong>{{ session('user')->nama ?? 'Afriza' }}</strong>! Berikut ringkasan sistem Anda.</p>

        <div class="card-grid">

            <div class="stat-card blue">
                <div class="label">Total Produk Terdaftar</div>
                <div class="value">{{ $totalProducts }}</div>
            </div>

            <div class="stat-card green">
                <div class="label">Jumlah Toko Aktif</div>
                <div class="value">{{ $totalTokos }}</div>
            </div>

            <div class="stat-card orange">
                <div class="label">Item Stok Rendah (&lt; 5)</div>
                <div class="value">{{ $stokRendah }}</div>
            </div>

            <div class="stat-card red">
                <div class="label">Total Unit Stok</div>
                <div class="value">{{ number_format($totalStokUnit) }}</div>
            </div>
        </div>

        <button class="btn-red"
                onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
            Logout
        </button>
    </div>

    <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

</body>
</html>
