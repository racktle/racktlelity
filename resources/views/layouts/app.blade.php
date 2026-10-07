<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#808080">
    <title>@yield('title', 'Racktility') — Racktility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root { --rack-primary: #808080; --rack-ink: #272727; --rack-muted: #858585; --rack-canvas: #f7f7f6; }
        body { color: var(--rack-ink); background: var(--rack-canvas); font-family: Inter, "Segoe UI", sans-serif; }
        .text-rack { color: var(--rack-primary) !important; }
        .btn-rack { color: #fff; background: var(--rack-primary); border-color: var(--rack-primary); }
        .btn-rack:hover, .btn-rack:focus { color: #fff; background: #696969; border-color: #696969; }
        .form-control, .form-select { min-height: 48px; border-color: #e7e7e5; border-radius: 12px; }
        .form-control:focus { border-color: #aaa; box-shadow: 0 0 0 .2rem rgba(128,128,128,.14); }
        .auth-shell { min-height: 100vh; background: #fff; }
        .auth-aside { min-height: 100vh; color: #fff; background: linear-gradient(145deg, #777, #929292); }
        .auth-aside .aside-copy { color: rgba(255,255,255,.78); max-width: 420px; }
        .brand-icon { width: 42px; height: 42px; color: #fff; background: var(--rack-primary); }
        .auth-card { width: min(100%, 430px); }
        .auth-form-label { font-size: .9rem; font-weight: 600; }
        .dashboard-nav { min-height: 72px; background: #fff; border-bottom: 1px solid #ededeb; }
        .dashboard-wrap { min-height: calc(100vh - 72px); }
        .dashboard-sidebar { width: 250px; background: #fff; border-right: 1px solid #ededeb; }
        .dashboard-main { min-width: 0; }
        .side-link { color: #777; border-radius: 10px; text-decoration: none; }
        .side-link.active, .side-link:hover { color: #333; background: #f1f1f0; }
        .metric-card, .content-card { background: #fff; border: 1px solid #eeeeec; border-radius: 18px; }
        .metric-icon { width: 44px; height: 44px; background: #f0f0ef; color: #686868; }
        .avatar { width: 40px; height: 40px; color: #555; background: #ececeb; }
        .welcome-panel { color: #fff; background: linear-gradient(115deg, #737373, #969696); border-radius: 20px; }
        .table > :not(caption) > * > * { padding: .9rem .75rem; }
        @media (max-width: 767.98px) {
            .auth-aside { display: none !important; }
            .dashboard-sidebar { width: 100%; border-right: 0; border-bottom: 1px solid #ededeb; }
            .sidebar-links { display: flex; gap: .5rem; overflow-x: auto; }
            .side-link { flex: 0 0 auto; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
