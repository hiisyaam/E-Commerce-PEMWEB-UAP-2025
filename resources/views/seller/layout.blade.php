<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','Seller Dashboard') - Ethereal</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #A4133C;
      --muted: #FFF0F3;
      --white: #ffffff;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #ffffff;
      color: #333;
      overflow-x: hidden;
    }

    .sidebar {
      width: 240px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background: var(--primary);
      color: white;
      padding-top: 20px;
      z-index: 1100;
    }

    .sidebar .menu a {
      display: block;
      padding: 14px 22px;
      font-weight: 600;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      margin: 6px 0;
      font-size: 18px;
    }

    .sidebar .menu a:hover,
    .sidebar .menu a.active {
      background: var(--muted);
      color: var(--primary);
    }

    .logo-img {
      width: 130px;
      display: block;
      margin: 0 auto 25px;
      filter: brightness(0) invert(1);
    }

    .topbar {
      height: 70px;
      background: var(--muted);
      position: fixed;
      top: 0;
      left: 240px;
      right: 0;
      z-index: 1200;
      padding: 0 25px;

      display: flex;
      align-items: center;
      justify-content: flex-end;
      border-bottom: 1px solid #eee;
    }

    .main-content {
      margin-left: 240px;
      padding: 110px 35px 40px;
      min-height: 100vh;
    }

    .page-title {
      color: var(--primary);
      font-weight: 700;
    }

    footer.footer {
      background: var(--muted);
      padding: 15px 0;
      text-align: center;
      margin-top: 50px;
      color: var(--primary);
    }

    .btn-primary-ethereal {
      background: var(--primary);
      color: #fff;
      border: none;
    }

    .btn-outline-secondary {
      border-color: var(--primary);
      color: var(--primary);
    }
    .btn-outline-secondary:hover {
      background: var(--primary);
      color: white;
    }

  </style>

  @stack('styles')
</head>
<body>

<aside class="sidebar">
  <img src="{{ asset('assets/images/logo.png') }}" class="logo-img">

  <div class="menu mt-3">
    <a href="{{ route('seller.dashboard') }}" class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('seller.products.index') }}" class="{{ request()->routeIs('seller.products.*') ? 'active' : '' }}">Produk</a>
    <a href="{{ route('seller.orders') }}" class="{{ request()->routeIs('seller.orders') ? 'active' : '' }}">Pesanan</a>
    <a href="{{ route('seller.balance') }}" class="{{ request()->routeIs('seller.balance') ? 'active' : '' }}">Saldo</a>
    <a href="{{ route('seller.profile') }}" class="{{ request()->routeIs('seller.profile') ? 'active' : '' }}">Profil Toko</a>
    <a href="{{ route('seller.withdrawals.index') }}" class="{{ request()->routeIs('seller.withdrawals.*') ? 'active' : '' }}">Penarikan</a>
  </div>
</aside>

<div class="topbar">
  <span class="fw-semibold me-3" style="color:var(--primary);">
    {{ Auth::user()->name ?? '' }}
  </span>

  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary-ethereal btn-sm">Logout</button>
  </form>
</div>

<main class="main-content">

  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  @yield('content')

  <div class="text-center mt-5">
    <a href="{{ route('member.dashboard') }}" class="btn btn-outline-secondary">
      Kembali ke Dashboard Member
    </a>
  </div>
</main>

<footer class="footer">
  <p>© {{ date('Y') }} Ethereal Stationery</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
