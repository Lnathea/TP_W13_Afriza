@extends('layouts.app')

@section('title', 'About - Muhammad Afriza Hidayat')

@section('content')
<div class="card">
    <h1><span class="section-icon">👨‍💻</span>Tentang Saya</h1>
    <p class="intro-text">Halo! Nama saya <strong class="highlight">Muhammad Afriza Hidayat</strong>, mahasiswa semester 5 jurusan Teknologi Informasi.</p>
</div>

<div class="card">
    <h2><span class="section-icon">📚</span>Fokus Belajar Saat Ini</h2>
    <p class="intro-text">Saat ini saya lagi fokus memperdalam pengembangan web, data, dan sedikit-sedikit mulai masuk ke machine learning serta AI. Seiring banyaknya tugas dan proyek yang harus saya kerjakan, saya makin tertarik untuk terus belajar tentang dunia IT yang luas.</p>
    
    <h3>Bidang yang Sedang Dipelajari:</h3>
    <div style="margin-top: 10px;">
        <span class="skill-tag">Web Development</span>
        <span class="skill-tag">Data Science</span>
        <span class="skill-tag">Machine Learning</span>
        <span class="skill-tag">Artificial Intelligence</span>
    </div>
</div>

<div class="card">
    <h2><span class="section-icon">🏛️</span>Kegiatan Organisasi</h2>
    <p class="intro-text">Saya juga ikut organisasi seperti <strong class="highlight">Google Developer Groups on Campus</strong>, di mana saya bisa bertemu teman-teman yang punya minat sama, belajar bareng, dan bikin project.</p>
</div>

<div class="card">
    <h2><span class="section-icon">🎯</span>Tujuan ke Depan</h2>
    <p class="intro-text">Di halaman ini saya ceritakan sedikit tentang perjalanan saya, minat saya, dan apa yang ingin saya capai ke depannya sebagai calon programmer.</p>
    <ul style="margin-top: 15px;">
        <li>Menguasai full-stack web development</li>
        <li>Memperdalam ilmu data science dan machine learning</li>
        <li>Berkontribusi di komunitas developer</li>
        <li>Membangun project-project yang bermanfaat</li>
    </ul>
</div>

<div class="card">
    <h2><span class="section-icon">🛠️</span>Tech Stack</h2>
    <h3>Programming & Web:</h3>
    <div>
        <span class="skill-tag">HTML</span>
        <span class="skill-tag">CSS</span>
        <span class="skill-tag">JavaScript</span>
        <span class="skill-tag">PHP</span>
        <span class="skill-tag">Python</span>
    </div>
    
    <h3>Tools & Framework:</h3>
    <div>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">Git</span>
        <span class="skill-tag">MySQL</span>
        <span class="skill-tag">VS Code</span>
    </div>
</div>
@endsection
