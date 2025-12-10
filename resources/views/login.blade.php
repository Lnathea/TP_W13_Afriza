<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Stok App</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Glow Background */
        .glow {
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(56, 189, 248, 0.3);
            filter: blur(150px);
            top: -80px;
            left: -80px;
        }

        .glow2 {
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: rgba(14, 165, 233, 0.25);
            filter: blur(130px);
            bottom: -70px;
            right: -70px;
        }

        .login-container {
            width: 100%;
            max-width: 380px;
            padding: 35px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(56, 189, 248, 0.2);
            text-align: center;
            position: relative;
            z-index: 5;
        }

        .logo {
            font-size: 45px;
            font-weight: 700;
            color: #38bdf8;
            text-shadow: 0 0 10px #38bdf8;
            margin-bottom: 6px;
        }

        .header h1 {
            color: #e2e8f0;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .header p {
            color: #94a3b8;
            margin-bottom: 28px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            margin-bottom: 14px;
            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.08);
            color: #e2e8f0;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.6);
            border-color: #38bdf8;
        }

        button {
            width: 100%;
            padding: 13px;
            background: linear-gradient(45deg, #0ea5e9, #38bdf8);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            margin-top: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.25s;
        }

        button:hover {
            transform: scale(1.03);
            box-shadow: 0 0 18px #38bdf8;
        }

        .error-message {
            margin-top: 18px;
            padding: 10px;
            background: rgba(255, 30, 30, 0.15);
            border: 1px solid rgba(255, 80, 80, 0.3);
            color: #ffb3b3;
            border-radius: 8px;
            font-weight: 500;
        }

        .register-link {
            margin-top: 18px;
            color: #94a3b8;
            font-size: 14px;
        }

        .register-link a {
            color: #38bdf8;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #0ea5e9;
        }
    </style>
</head>

<body>

    <div class="glow"></div>
    <div class="glow2"></div>

    <div class="login-container">

        <div class="header">
            <div class="logo">TA</div>
            <h1>Selamat Datang</h1>
            <p>Toko Afriza</p>
        </div>

        <form action="/login" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Email Anda" required>
            <input type="password" name="password" placeholder="Password Anda" required>

            <button type="submit">LOGIN</button>

            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <div class="register-link">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </form>

    </div>
</body>
</html>
