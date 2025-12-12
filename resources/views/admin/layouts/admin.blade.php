<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Ethereal</title>

    <!-- Font & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #FFF5F7;
            font-family: 'Poppins', sans-serif;
            padding-top: 90px;
        }

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

<div class="admin-nav">

<!-- KIRI: LOGO + TITLE -->
<div class="nav-left d-flex align-items-center">
    <img src="{{ asset('assets/images/logo.png') }}" 
         alt="Logo" 
         class="admin-logo">
    <div class="nav-title ms-2">Admin Panel</div>
</div>


<!-- TENGAH: MENU -->
<div class="admin-menu text-center">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.users') }}">Users</a>
    <a href="{{ route('admin.stores.index') }}">Stores</a>
    <a href="{{ route('admin.verification.index') }}">Verification</a>
</div>

<!-- KANAN: LOGOUT -->
<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button class="btn-logout">Logout</button>
</form>
</div>


    <!-- PAGE CONTENT -->
    <div class="container mt-5 mb-5" style="margin-top: 120px;">
    @yield('content')
</div>

    <!-- FOOTER -->
    <footer class="footer-ethereal">
        <div class="container text-center">
            <img src="{{ asset('assets/images/logo.png') }}" 
                 alt="Ethereal Logo" 
                 style="width: 80px; margin-bottom: 10px;">

            <p class="footer-text">
                Ethereal Stationery — Temukan alat tulis terbaik untuk kebutuhanmu.
            </p>

            <p class="footer-copy">
                © 2025 Ethereal Stationery. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>