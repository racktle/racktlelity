@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<nav class="dashboard-nav d-flex align-items-center">
    <div class="container-fluid px-3 px-lg-4 d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-decoration-none d-flex align-items-center gap-2 fw-semibold text-dark">
            <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span> Racktility
        </a>
        <div class="d-flex align-items-center gap-3">
            <span class="small text-secondary d-none d-sm-inline">Dashboard belajar</span>
            <div class="avatar rounded-circle d-flex align-items-center justify-content-center fw-semibold">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-light btn-sm rounded-pill px-3" type="submit">Keluar</button></form>
        </div>
    </div>
</nav>
<div class="dashboard-wrap d-md-flex">
    <aside class="dashboard-sidebar p-3 p-lg-4">
        <p class="small text-uppercase text-secondary fw-semibold px-2 mb-3" style="letter-spacing:.1em">Menu utama</p>
        <nav class="sidebar-links flex-md-column">
            <a class="side-link active d-flex align-items-center gap-3 px-3 py-2 mb-1" href="{{ route('dashboard') }}"><i class="bi bi-grid"></i>Ringkasan</a>
            <a class="side-link d-flex align-items-center gap-3 px-3 py-2 mb-1" href="#kelas"><i class="bi bi-journal-bookmark"></i>Kelas saya</a>
            <a class="side-link d-flex align-items-center gap-3 px-3 py-2 mb-1" href="#aktivitas"><i class="bi bi-activity"></i>Aktivitas</a>
        </nav>
        <div class="content-card p-3 mt-4 d-none d-md-block">
            <i class="bi bi-lightbulb text-rack fs-5"></i>
            <p class="small fw-semibold mt-2 mb-1">Konsisten itu penting</p>
            <p class="small text-secondary mb-0">Belajar sedikit setiap hari membawamu lebih dekat ke tujuan.</p>
        </div>
    </aside>
    <main class="dashboard-main flex-grow-1 p-3 p-lg-5">
        <div class="mb-4">
            <p class="small text-secondary mb-1">{{ now()->translatedFormat('l, d F Y') }}</p>
            <h1 class="h3 fw-semibold mb-1">Halo, {{ auth()->user()->name }} <span aria-hidden="true">👋</span></h1>
            <p class="text-secondary mb-0">Senang melihatmu kembali. Siap melanjutkan belajar?</p>
        </div>
        <section class="welcome-panel p-4 p-lg-5 mb-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-8">
                    <p class="small text-white-50 mb-2">RUANG BELAJARMU</p>
                    <h2 class="h3 fw-semibold">Setiap langkah kecil berarti.</h2>
                    <p class="text-white-50 mb-0">Pilih kelas yang ingin kamu pelajari dan mulai dari mana saja.</p>
                </div>
                <div class="col-lg-4 text-lg-end"><a href="#kelas" class="btn btn-light rounded-pill px-4">Lihat kelas <i class="bi bi-arrow-right ms-1"></i></a></div>
            </div>
        </section>
        <section class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-journal-check"></i></span>
                    <div class="small text-secondary">Kelas diikuti</div><div class="h3 fw-semibold mb-0">0</div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-clock-history"></i></span>
                    <div class="small text-secondary">Waktu belajar</div><div class="h3 fw-semibold mb-0">Mulai hari ini</div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-trophy"></i></span>
                    <div class="small text-secondary">Pencapaian</div><div class="h3 fw-semibold mb-0">Langkah pertamamu</div>
                </article>
            </div>
        </section>
        <section id="kelas" class="content-card p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div><h2 class="h5 fw-semibold mb-1">Kelas untukmu</h2><p class="small text-secondary mb-0">Ruang kelas yang bisa kamu jelajahi.</p></div>
                <span class="badge text-bg-light rounded-pill">Segera hadir</span>
            </div>
            <div class="border rounded-4 p-4 text-center">
                <span class="metric-icon rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"><i class="bi bi-journal-plus"></i></span>
                <h3 class="h6 fw-semibold">Kelas pertamamu menunggu</h3>
                <p class="small text-secondary mb-0">Kami sedang menyiapkan pengalaman belajar yang menyenangkan untukmu.</p>
            </div>
        </section>
        <section id="aktivitas" class="content-card p-4">
            <h2 class="h5 fw-semibold mb-1">Aktivitas belajar</h2>
            <p class="small text-secondary mb-3">Perjalanan belajarmu akan muncul di sini.</p>
            <div class="d-flex align-items-center gap-3 rounded-3 bg-light p-3">
                <i class="bi bi-stars text-rack"></i><span class="small text-secondary">Akun Racktility berhasil dibuat. Selamat belajar!</span>
            </div>
        </section>
    </main>
</div>
@endsection
