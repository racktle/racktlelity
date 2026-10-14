@extends('layouts.app')

@section('title', $course['title'])

@push('styles')
    <style>
        .course-hero { padding: 66px 0 72px; background: radial-gradient(ellipse at 82% 30%, #e5e5e3 0, transparent 35%), #f7f7f6; }
        .course-hero h1 { font-size: clamp(2.8rem, 6vw, 4.8rem); font-weight: 800; letter-spacing: -.07em; }
        .course-hero-copy { max-width: 610px; color: #707070; font-size: 1.08rem; line-height: 1.8; }
        .course-visual { display: grid; width: min(100%, 290px); aspect-ratio: 1; margin: auto; place-items: center; color: #fff; background: linear-gradient(145deg, #aaa, #555); border-radius: 42% 58% 53% 47% / 47% 43% 57% 53%; box-shadow: 0 30px 70px rgba(30,30,30,.17); }
        .course-visual i { font-size: 6rem; }
        .course-detail-card, .related-card { height: 100%; padding: 27px; background: #fff; border: 1px solid #e9e9e7; border-radius: 18px; }
        .course-detail-card h2, .related-title { font-size: 1.2rem; font-weight: 750; letter-spacing: -.03em; }
        .course-detail-card p, .course-detail-card li { color: #6e6e6e; line-height: 1.75; }
        .course-detail-card li + li { margin-top: 10px; }
        .course-section { padding: 64px 0; }
        .course-section-muted { background: #ececeb; }
        .course-kicker { color: #707070; font-size: .75rem; font-weight: 750; letter-spacing: .14em; text-transform: uppercase; }
        .course-badge { padding: 8px 12px; color: #555; background: #eee; border-radius: 999px; font-size: .82rem; font-weight: 650; }
        .related-card { display: flex; flex-direction: column; gap: 10px; text-decoration: none; transition: transform .2s ease, box-shadow .2s ease; }
        .related-card:hover { color: inherit; box-shadow: 0 14px 35px rgba(30,30,30,.08); transform: translateY(-3px); }
        .related-card i { color: #777; font-size: 1.5rem; }
        .related-card p { flex-grow: 1; color: #707070; font-size: .9rem; line-height: 1.6; }
        @media (max-width: 767.98px) { .course-hero { padding: 48px 0; } .course-visual { width: min(70%, 220px); margin-top: 24px; } .course-visual i { font-size: 4.5rem; } }
    </style>
@endpush

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

    <main>
        <section class="course-hero">
            <div class="container">
                <a class="small text-secondary text-decoration-none" href="{{ route('home') }}#kelas"><i class="bi bi-arrow-left me-2"></i>Kembali ke semua kelas</a>
                <div class="row align-items-center g-5 mt-1">
                    <div class="col-lg-7">
                        <div class="course-kicker">{{ $course['category'] }}</div>
                        <h1 class="my-3">{{ $course['title'] }}</h1>
                        <p class="course-hero-copy">{{ $course['description'] }}</p>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="course-badge"><i class="bi bi-bar-chart me-1"></i>{{ $course['level'] }}</span>
                            <span class="course-badge"><i class="bi bi-collection-play me-1"></i>{{ $course['duration'] }}</span>
                            <span class="course-badge"><i class="bi bi-play-circle me-1"></i>Belajar mandiri</span>
                        </div>
                        <a class="btn btn-rack rounded-pill px-4 py-3" href="{{ route('register') }}">Mulai belajar <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                    <div class="col-lg-5">
                        <div class="course-visual" aria-hidden="true"><i class="bi {{ $course['icon'] }}"></i></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="course-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <article class="course-detail-card">
                            <h2><i class="bi bi-journal-text text-rack me-2"></i>Yang akan kamu pelajari</h2>
                            <ul class="mt-4 mb-0 ps-3">
                                @foreach ($course['modules'] as $module)
                                    <li>{{ $module }}</li>
                                @endforeach
                            </ul>
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <article class="course-detail-card">
                            <h2><i class="bi bi-stars text-rack me-2"></i>Setelah menyelesaikan kelas</h2>
                            <p class="mt-3">Kamu akan punya bekal untuk:</p>
                            <ul class="mb-0 ps-3">
                                @foreach ($course['outcomes'] as $outcome)
                                    <li>{{ $outcome }}</li>
                                @endforeach
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="course-section course-section-muted">
            <div class="container">
                <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                    <div>
                        <div class="course-kicker">Lanjut bereksplorasi</div>
                        <h2 class="related-title mt-2 mb-0">Kelas kreatif lainnya</h2>
                    </div>
                    <a class="small fw-semibold text-dark text-decoration-none" href="{{ route('home') }}#kelas">Lihat semua kelas <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
                <div class="row g-3">
                    @foreach ($relatedCourses as $relatedCourse)
                        <div class="col-sm-6 col-lg-4">
                            <a class="related-card" href="{{ route('courses.show', $relatedCourse['slug']) }}">
                                <i class="bi {{ $relatedCourse['icon'] }}"></i>
                                <span class="course-kicker">{{ $relatedCourse['category'] }}</span>
                                <span class="fw-bold">{{ $relatedCourse['title'] }}</span>
                                <p class="mb-0">{{ $relatedCourse['summary'] }}</p>
                                <span class="small fw-semibold">Lihat kelas <i class="bi bi-arrow-right ms-1"></i></span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <a class="text-decoration-none d-flex align-items-center gap-2 fw-semibold text-dark" href="{{ route('home') }}">
                <span class="brand-icon rounded-3 d-inline-flex align-items-center justify-content-center"><i class="bi bi-layers"></i></span>
                Racktility
            </a>
            <span class="small text-secondary">Belajar kreatif, berkarya tanpa batas.</span>
            <a class="small text-dark text-decoration-none" href="{{ route('register') }}">Buat akun <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
    </footer>
@endsection
