@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<nav class="dashboard-nav d-flex align-items-center">
    <div class="container-fluid px-3 px-lg-4 d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center gap-2 fw-semibold text-dark">
            <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span> Racktility <span class="badge text-bg-light ms-1">Admin</span>
        </a>
        <div class="d-flex align-items-center gap-3">
            <span class="small text-secondary d-none d-sm-inline">{{ auth()->user()->name }}</span>
            <div class="avatar rounded-circle d-flex align-items-center justify-content-center fw-semibold">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-light btn-sm rounded-pill px-3" type="submit">Keluar</button></form>
        </div>
    </div>
</nav>
<div class="dashboard-wrap d-md-flex">
    <aside class="dashboard-sidebar p-3 p-lg-4">
        <p class="small text-uppercase text-secondary fw-semibold px-2 mb-3" style="letter-spacing:.1em">Administrasi</p>
        <nav class="sidebar-links flex-md-column">
            <a class="side-link active d-flex align-items-center gap-3 px-3 py-2 mb-1" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i>Ringkasan</a>
            <a class="side-link d-flex align-items-center gap-3 px-3 py-2 mb-1" href="#pengguna"><i class="bi bi-people"></i>Pengguna</a>
            <a class="side-link d-flex align-items-center gap-3 px-3 py-2 mb-1" href="#pengaturan"><i class="bi bi-gear"></i>Pengaturan</a>
        </nav>
    </aside>
    <main class="dashboard-main flex-grow-1 p-3 p-lg-5">
        <div class="mb-4">
            <p class="small text-secondary mb-1">{{ now()->translatedFormat('l, d F Y') }}</p>
            <h1 class="h3 fw-semibold mb-1">Dashboard admin</h1>
            <p class="text-secondary mb-0">Pantau pengguna dan pengelolaan Racktility.</p>
        </div>
        <section class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-people"></i></span>
                    <div class="small text-secondary">Total pengguna</div><div class="h3 fw-semibold mb-0">{{ number_format($totalUsers) }}</div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-shield-check"></i></span>
                    <div class="small text-secondary">Administrator</div><div class="h3 fw-semibold mb-0">{{ number_format($totalAdmins) }}</div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4">
                <article class="metric-card p-4 h-100">
                    <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center mb-3"><i class="bi bi-journal-bookmark"></i></span>
                    <div class="small text-secondary">Kelas aktif</div><div class="h3 fw-semibold mb-0">0</div>
                </article>
            </div>
        </section>
        <section id="pengguna" class="content-card p-3 p-lg-4 mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                <div><h2 class="h5 fw-semibold mb-1">Pengguna terbaru</h2><p class="small text-secondary mb-0">Akun pelajar yang baru bergabung.</p></div>
                <span class="badge text-bg-light rounded-pill">{{ $latestUsers->count() }} akun</span>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead><tr class="small text-secondary"><th>Nama</th><th>Email</th><th>Bergabung</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse ($latestUsers as $user)
                            <tr>
                                <td class="fw-semibold">{{ $user->name }}</td>
                                <td class="text-secondary">{{ $user->email }}</td>
                                <td class="text-secondary">{{ $user->created_at->format('d M Y') }}</td>
                                <td><span class="badge rounded-pill text-bg-light">Pelajar</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada pengguna yang mendaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <section id="pengaturan" class="content-card p-4">
            <div class="d-flex gap-3 align-items-start">
                <span class="metric-icon rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"><i class="bi bi-info-circle"></i></span>
                <div><h2 class="h6 fw-semibold">Pengelolaan kelas</h2><p class="small text-secondary mb-0">Dashboard kelas sudah siap untuk dikembangkan. Fitur pembuatan dan pengelolaan kelas belum termasuk dalam versi ini.</p></div>
            </div>
        </section>
    </main>
</div>
@endsection
