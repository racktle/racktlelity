@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<main class="auth-shell row g-0">
    <aside class="auth-aside col-md-5 col-xl-6 d-flex flex-column justify-content-between p-5">
        <a href="/" class="text-white text-decoration-none d-inline-flex align-items-center gap-2 fw-semibold">
            <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span>
            Racktility
        </a>
        <div class="py-5">
            <p class="small text-uppercase fw-semibold mb-3" style="letter-spacing:.15em">Senang melihatmu kembali</p>
            <h1 class="display-5 fw-semibold mb-3">Lanjutkan perjalanan belajarmu.</h1>
            <p class="aside-copy mb-0">Masuk untuk kembali ke kelas, melihat progres, dan menyambung hal baik yang sudah kamu mulai.</p>
        </div>
        <span class="small text-white-50">© {{ date('Y') }} Racktility</span>
    </aside>
    <section class="col-md-7 col-xl-6 d-flex align-items-center justify-content-center p-4 p-lg-5">
        <div class="auth-card">
            <a href="/" class="text-decoration-none d-inline-flex align-items-center gap-2 fw-semibold text-dark mb-5 d-md-none">
                <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span> Racktility
            </a>
            <p class="text-rack small fw-semibold text-uppercase mb-2" style="letter-spacing:.12em">Selamat datang</p>
            <h2 class="fw-semibold mb-2">Masuk ke akunmu</h2>
            <p class="text-secondary mb-4">Isi detail akun untuk melanjutkan belajar.</p>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label auth-form-label">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com" autocomplete="email" required autofocus>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password" class="form-label auth-form-label">Kata sandi</label>
                    </div>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                </div>
                <div class="form-check mb-4">
                    <input id="remember" name="remember" type="checkbox" value="1" class="form-check-input">
                    <label for="remember" class="form-check-label small text-secondary">Ingat saya</label>
                </div>
                <button class="btn btn-rack btn-lg w-100 rounded-3" type="submit">Masuk</button>
            </form>
            <p class="text-center small text-secondary mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-dark fw-semibold">Daftar sekarang</a></p>
        </div>
    </section>
</main>
@endsection
