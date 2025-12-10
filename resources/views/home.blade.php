@extends('layouts.app')

@section('title', 'Home - Muhammad Afriza Hidayat')

@section('content')
<div class="card">
    <div class="profile-header">
        <img src="{{ asset('Foto.png') }}" alt="Muhammad Afriza Hidayat" class="profile-img">
        <h1>👋 Selamat Datang!</h1>
        <p>Portfolio <span class="highlight">Muhammad Afriza Hidayat</span></p>
    </div>
</div>

<div class="card">
    <h2><span class="section-icon">🎯</span>Tentang Portfolio Ini</h2>
    <p class="intro-text">Selamat datang di portofolio saya! Di halaman ini kamu bisa melihat sedikit gambaran tentang siapa saya dan apa saja yang sedang saya pelajari sebagai mahasiswa semester 5 di bidang Teknologi Informasi.</p>
    <p class="intro-text">Website ini saya buat sebagai tempat untuk menampilkan perjalanan belajar saya, mulai dari projek kecil sampai pengalaman yang saya dapatkan dari kelas maupun kegiatan kampus.</p>
</div>

<div class="card">
    <h2><span class="section-icon">🚀</span>Terus Berkembang</h2>
    <p class="intro-text">Saya masih terus berkembang dan mencoba banyak hal baru di dunia teknologi, jadi portofolio ini akan terus saya update seiring bertambahnya skill yang saya pelajari.</p>
</div>

<div class="card">
    <h2><span class="section-icon">💡</span>Bidang yang Dipelajari</h2>
    <div style="margin-top: 15px;">
        <span class="skill-tag">🌐 Web Development</span>
        <span class="skill-tag">📊 Data</span>
        <span class="skill-tag">🤖 Machine Learning</span>
        <span class="skill-tag">🧠 Artificial Intelligence</span>
    </div>
</div>

<div class="card">
    <h2><span class="section-icon">🏛️</span>Organisasi</h2>
    <p class="intro-text">Aktif di <strong class="highlight">Google Developer Groups on Campus</strong> — komunitas untuk belajar bareng dan bikin project dengan teman-teman yang punya minat sama di bidang teknologi.</p>
</div>
@endsection
