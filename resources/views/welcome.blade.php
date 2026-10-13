@extends('layouts.app')

@section('title', 'Belajar, tumbuh, dan berkembang')

@section('content')
<nav class="navbar bg-white border-bottom sticky-top">
    <div class="container py-2">
        <a class="text-decoration-none d-flex align-items-center gap-2 fw-semibold text-dark" href="{{ route('home') }}">
            <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span>
            Racktility
        </a>
        <div class="d-flex gap-2">
            <a class="btn btn-light rounded-pill px-3" href="{{ route('login') }}">Masuk</a>
            <a class="btn btn-rack rounded-pill px-3" href="{{ route('register') }}">Daftar</a>
        </div>
    </div>
</nav>
<main class="d-flex align-items-center" style="min-height:calc(100vh - 73px);background:radial-gradient(circle at 80% 28%,#e5e5e3 0,transparent 30%),#f7f7f6">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="text-rack text-uppercase small fw-semibold mb-4" style="letter-spacing:.14em">Belajar dengan arah yang jelas</p>
                <h1 class="display-1 fw-semibold mb-4" style="max-width:680px;letter-spacing:-.065em;line-height:1.02">Ruang belajar untuk <span class="text-secondary">tumbuh.</span></h1>
                <p class="text-secondary fs-5 mb-4" style="max-width:510px;line-height:1.8">Temukan kelas yang tepat, ikuti progres belajarmu, dan bangun keterampilan baru bersama Racktility.</p>
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <a href="{{ route('register') }}" class="btn btn-rack btn-lg rounded-pill px-4">Mulai belajar <i class="bi bi-arrow-right ms-2"></i></a>
                    <span class="small text-secondary"><i class="bi bi-shield-check me-1"></i> Belajar dengan nyaman</span>
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-lg-end">
                <div class="content-card p-4 p-md-5 w-100" style="max-width:390px;border-radius:24px;box-shadow:0 28px 80px rgba(30,30,30,.09)">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <span class="small text-secondary">Gambaran kelas</span><i class="bi bi-three-dots text-secondary"></i>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="metric-icon rounded-4 d-inline-flex align-items-center justify-content-center"><i class="bi bi-lightbulb fs-5"></i></span>
                        <div><div class="fw-semibold">Belajar hal baru</div><div class="small text-secondary">Dengan ritmemu sendiri</div></div>
                    </div>
                    <div class="d-flex justify-content-between small mb-2"><span class="text-secondary">Progres belajarmu</span><span>Terus bertumbuh</span></div>
                    <div class="progress rounded-pill mb-4" style="height:6px"><div class="progress-bar rounded-pill" style="width:72%;background:#808080"></div></div>
                    <div class="border-top pt-4 d-flex gap-3 align-items-center">
                        <div class="avatar rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-play-fill"></i></div>
                        <div class="small"><div class="fw-semibold">Satu langkah setiap hari</div><div class="text-secondary">Perjalananmu dimulai di sini</div></div>
                        <i class="bi bi-arrow-up-right ms-auto text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
