<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Stok App</title>

    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top, #0f172a, #020617);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* ===== BACKGROUND ORBS ===== */
        .orb {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(0, 200, 255, 0.7);
            filter: blur(120px);
            animation: float 6s infinite ease-in-out alternate;
        }
        .orb2 {
            background: rgba(0, 150, 255, 0.6);
            left: 60%;
            top: 60%;
            animation-delay: 1.5s;
        }

        @keyframes float {
            from { transform: translateY(0px); }
            to   { transform: translateY(-50px); }
        }

        /* ===== GLASS CONTAINER ===== */
        .login-container {
            width: 100%;
            max-width: 380px;
            padding: 40px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 25px rgba(0, 200, 255, 0.4);
            text-align: center;
            position: relative;
            z-index: 5;
        }

        /* Logo Futuristik */
        .logo {
            font-size: 48px;
            font-weight: 700;
            color: #38bdf8;
            letter-spacing: 2px;
            text-shadow: 0 0 15px #38bdf8;
            margin-bottom: 10px;
        }

        .header h1 {
            color: #e2e8f0;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .header p {
            color: #94a3b8;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        /* Input futuristik */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 15px;
            outline: none;
            backdrop-filter: blur(4px);
            transition: 0.3s;
        }

        input:focus {
            background: rgba(0, 200, 255, 0.15);
            box-shadow: 0 0 12px #38bdf8;
        }

        /* Tombol glowing */
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            background: linear-gradient(45deg, #0ea5e9, #38bdf8);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 0 15px #0ea5e9;
        }

        button:hover {
            transform: scale(1.03);
            box-shadow: 0 0 25px #38bdf8;
        }

        /* Error Message */
        .error-message {
            margin-top: 20px;
            padding: 12px;
            background: rgba(255, 30, 30, 0.15);
            border: 1px solid rgba(255, 80, 80, 0.3);
            color: #ffb3b3;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body>

    <!-- Background Orbs -->
    <div class="orb"></div>
    <div class="orb orb2"></div>

    <div class="login-container">

        <div class="header">
            <div class="logo">TA</div>
            <h1>Selamat Datang</h1>
            <p>Toko Afriza</p>
        </div>

        <form action="/login" method="POST">
            @csrf

            <input type="text" name="username" placeholder="Masukkan Username Anda" required>
            <input type="password" name="password" placeholder="Masukkan Password Anda" required>

            <button type="submit">LOGIN</button>

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
        </form>

    </div>
</body>
</html>
