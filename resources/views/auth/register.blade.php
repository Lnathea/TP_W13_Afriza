<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Stok App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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

        .auth-container {
            width: 100%;
            max-width: 420px;
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

        input[type="text"],
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
            margin-bottom: 18px;
            padding: 10px;
            background: rgba(255, 30, 30, 0.15);
            border: 1px solid rgba(255, 80, 80, 0.3);
            color: #ffb3b3;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            text-align: left;
        }

        .login-link {
            margin-top: 18px;
            color: #94a3b8;
            font-size: 14px;
        }

        .login-link a {
            color: #38bdf8;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #0ea5e9;
        }
    </style>
</head>

<body>

    <div class="glow"></div>
    <div class="glow2"></div>

    <div class="auth-container">

        <div class="header">
            <div class="logo">TA</div>
            <h1>Daftar Akun</h1>
            <p>Toko Afriza</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                <ul style="list-style: none; margin: 0; padding: 0;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Email Anda" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">DAFTAR</button>

            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login sekarang</a>
            </div>
        </form>

    </div>
</body>
</html>
