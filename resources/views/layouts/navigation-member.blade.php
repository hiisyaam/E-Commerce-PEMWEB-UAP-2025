<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
    <a class="navbar-brand" href="/member/dashboard">
        <img src="/logo.png" height="40">
    </a>

    <form class="d-flex ms-4" style="width: 300px">
        <input class="form-control" type="search" placeholder="Cari produk...">
    </form>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="POST">@csrf
                <button class="btn btn-link nav-link">Logout</button>
            </form>
        </li>
    </ul>
</nav>