<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3b8c8, #e38fa2, #d86e82);
            margin: 0;
            padding: 40px 0;
        }

        /* NAVBAR */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 0 40px;
            position: relative;
            z-index: 1000;
        }

        .back-to-dashboard {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            padding: 10px 18px;
            border-radius: 30px;
            color: #6b2b38;
            font-weight: 600;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .back-to-dashboard:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: scale(1.02);
        }

 .nav-right {
            position: relative;
            display: flex;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            padding: 10px 18px;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .user-info:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
        }

        .username {
            font-weight: 600;
            color: #6b2b38;
        }

        .dropdown-menu {
            position: absolute;
            top: 60px;
            right: 0;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            width: 180px;
            border-radius: 12px;
            box-shadow: 0px 8px 18px rgba(0,0,0,0.20);
            display: none;
            flex-direction: column;
            padding: 12px 0;
            z-index: 1001; 
        }

        .dropdown-menu a,
        .dropdown-menu button {
            padding: 12px 18px;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            font-size: 15px;
            cursor: pointer;
            color: #6b2b38;
            text-decoration: none;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: rgba(230, 170, 185, 0.3);
        }

        /* MAIN PAGE CONTENT */
        .container {
            max-width: 1000px;
            margin: auto;
            padding: 0 40px;
        }

        .title-box {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
            text-align: center;
            margin-bottom: 35px;
            border-left: 8px solid #c96a7f;
        }

        .title-box i {
            font-size: 3rem;
            color: #6b2b38;
        }

        .title-box h2 {
            margin-top: 12px;
            font-size: 2rem;
            font-weight: 700;
            color: #6b2b38;
        }

        /* TABLE */
        .table-box {
            background: rgba(255,255,255,0.4);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            color: #6b2b38;
        }

        th {
            background: rgba(255,255,255,0.6);
            font-weight: 700;
        }

        tr {
            background: rgba(255,255,255,0.4);
        }

        tr:hover {
            background: rgba(255,255,255,0.7);
        }

        .btn-add {
            display: inline-block;
            background: #6b2b38;
            padding: 10px 18px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 15px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
        }

        .btn-edit { background: #c96a7f; color:white; padding:6px 12px; border-radius:6px; text-decoration:none; }
        .btn-delete { background:#8b1e2e; color:white; padding:6px 12px; border:none; border-radius:6px; }

    </style>
</head>

<body>

{{-- NAVBAR --}}
<div class="top-navbar">
    <a href="{{ route('admin.dashboard') }}" class="back-to-dashboard">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali</span>
    </a>

    <div class="nav-right">
        <div class="user-info" onclick="toggleDropdown()">
            <img src="https://ui-avatars.com/api/?name=Admin" class="avatar">
            <span class="username">Admin</span>
            <i class="fas fa-caret-down"></i>
        </div>

        <div class="dropdown-menu" id="dropdownMenu">
            <a href="#">Profil</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>

<div class="container">

    {{-- TITLE --}}
    <div class="title-box">
        <i class="fas fa-users"></i>
        <h2>Manajemen User</h2>
        <p>Daftar semua pengguna dalam sistem.</p>
    </div>

    {{-- TABLE --}}
    <div class="table-box">

        <a href="/admin/users/create" class="btn-add">+ Tambah User</a>

        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>

                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-edit">Edit</a>

                    <form action="/admin/users/{{ $user->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($users->isEmpty())
            <tr>
                <td colspan="4" style="text-align:center; padding:20px; font-weight:600;">
                    Tidak ada user.
                </td>
            </tr>
            @endif

        </table>
    </div>
</div>

<script>
function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

document.addEventListener("click", function(e) {
    const menu = document.getElementById("dropdownMenu");
    const userInfo = document.querySelector(".user-info");

    if (menu.style.display === "block" && !userInfo.contains(e.target) && !menu.contains(e.target)) {
        menu.style.display = "none";
    }
});
</script>

</body>
</html>
