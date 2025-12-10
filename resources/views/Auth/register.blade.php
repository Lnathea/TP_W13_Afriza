<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Toko AFRIZA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white d-flex align-items-center justify-content-center vh-100">

<div class="card shadow-lg p-4" style="width: 400px; background: #111;">
    <h3 class="text-center mb-3">Daftar Akun</h3>

    @if($errors->any())
        <div class="alert alert-danger py-2">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button class="btn btn-primary w-100 mt-2">Register</button>

        <p class="text-center mt-3 text-secondary" style="font-size: 14px;">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-info">Login</a>
        </p>
    </form>
</div>

</body>
</html>
