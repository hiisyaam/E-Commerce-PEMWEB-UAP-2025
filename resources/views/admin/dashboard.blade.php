<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Ethereal</title>

    <!-- Font & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #FFF5F7;
            font-family: 'Poppins', sans-serif;
        }

        /* FIXED NAVBAR */
        .admin-nav {
            background-color: #FFFFFF;
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);

            display: flex;
            justify-content: space-between;
            align-items: center;

            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        /* Logo kecil */
        .admin-logo {
            width: 45px;
            height: auto;
        }

        .nav-title {
            font-size: 20px;
            font-weight: 700;
            color: #A4133C;
            margin-left: 10px;
        }

        /* MENU DI TENGAH */
        .admin-menu {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .admin-menu a {
            color: #A4133C;
            font-weight: 500;
            margin: 0 15px;
            text-decoration: none;
        }

        .admin-menu a:hover {
            color: #8f0f32;
        }

        .btn-logout {
            background-color: #A4133C;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn-logout:hover {
            background-color: #8f0f32;
        }

        /* Card Statistik */
        .stat-card {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            border: 1px solid #f0d9df;
            transition: 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(164, 19, 60, 0.15);
        }

        .stat-title {
            font-size: 16px;
            font-weight: 600;
            color: #A4133C;
        }

        .stat-value {
            font-size: 34px;
            font-weight: 700;
            margin-top: 8px;
            color: #333;
        }

        /* FOOTER */
        .footer-ethereal {
            background-color: #FFF0F3;
            padding: 40px 0;
            border-top: 2px solid #f5d7dd;
            margin-top: 60px;
        }

        .footer-text {
            color: #A4133C;
            font-size: 14px;
            margin-top: 10px;
        }

        .footer-copy {
            color: #8f8f8f;
            font-size: 13px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="admin-nav">

        <!-- KIRI: LOGO + JUDUL -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/images/logo.png') }}" class="admin-logo" alt="Logo">
            <div class="nav-title">Admin Panel</div>
        </div>

        <!-- TENGAH: MENU -->
        <div class="admin-menu">
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/users">Users</a>
            <a href="/admin/stores">Stores</a>
            <a href="/admin/stores/verification">Verification</a>
        </div>

        <!-- KANAN: LOGOUT -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn-logout">Logout</button>
        </form>

    </div>

    <!-- KONTEN – kasih margin-top agar tidak ketutup navbar -->
    <div class="container" style="margin-top: 130px;">
        <h2 class="fw-bold mb-4" style="color:#A4133C;">Dashboard Admin</h2>

        <div class="row g-4">

            <!-- Total Users -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-title">Total Users</div>
                    <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
                </div>
            </div>

            <!-- Total Stores -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-title">Total Stores</div>
                    <div class="stat-value">{{ $totalStores ?? 0 }}</div>
                </div>
            </div>

            <!-- Pending Stores -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-title">Pending Verification</div>
                    <div class="stat-value">{{ $pendingStores ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-ethereal">
        <div class="container text-center">
            <img src="{{ asset('assets/images/logo.png') }}" 
                 alt="Ethereal Logo" 
                 style="width: 80px; margin-bottom: 10px;">

            <p class="footer-text">Ethereal Stationery — Temukan alat tulis terbaik untuk kebutuhanmu.</p>

            <p class="footer-copy">© 2025 Ethereal Stationery. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>