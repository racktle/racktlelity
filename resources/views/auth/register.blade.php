@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<main class="auth-shell row g-0">
    <aside class="auth-aside col-md-5 col-xl-6 d-flex flex-column justify-content-between p-5">
        <a href="/" class="text-white text-decoration-none d-inline-flex align-items-center gap-2 fw-semibold">
            <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span>
            Racktility
        </a>
        <div class="py-5">
            <p class="small text-uppercase fw-semibold mb-3" style="letter-spacing:.15em">Satu langkah baru</p>
            <h1 class="display-5 fw-semibold mb-3">Mulai belajar dengan cara yang lebih terarah.</h1>
            <p class="aside-copy mb-0">Buat akun gratis dan siapkan ruangmu untuk belajar, bertumbuh, dan mencapai tujuan berikutnya.</p>
        </div>
        <span class="small text-white-50">© {{ date('Y') }} Racktility</span>
    </aside>
    <section class="col-md-7 col-xl-6 d-flex align-items-center justify-content-center p-4 p-lg-5">
        <div class="auth-card py-md-3">
            <a href="/" class="text-decoration-none d-inline-flex align-items-center gap-2 fw-semibold text-dark mb-4 d-md-none">
                <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span> Racktility
            </a>
            <p class="text-rack small fw-semibold text-uppercase mb-2" style="letter-spacing:.12em">Buat akun</p>
            <h2 class="fw-semibold mb-2">Mulai perjalananmu</h2>
            <p class="text-secondary mb-4">Daftar untuk mendapatkan dashboard belajar pribadi.</p>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label auth-form-label">Nama lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Nama kamu" autocomplete="name" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label auth-form-label">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="nama@email.com" autocomplete="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label auth-form-label">Kata sandi</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Minimal 8 karakter" autocomplete="new-password" minlength="8" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label auth-form-label">Konfirmasi kata sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Ulangi kata sandi" autocomplete="new-password" required>
                </div>
                <div class="form-check mb-4">
                    <input id="terms" name="terms" type="checkbox" class="form-check-input" value="1" required>
                    <label for="terms" class="form-check-label small text-secondary">Saya menyetujui syarat penggunaan Racktility.</label>
                </div>
                <button class="btn btn-rack btn-lg w-100 rounded-3" type="submit">Buat akun</button>
            </form>
            <p class="text-center small text-secondary mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-dark fw-semibold">Masuk</a></p>
        </div>
    </section>
</main>
@endsection
