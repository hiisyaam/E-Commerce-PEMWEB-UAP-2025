<nav class="navbar navbar-expand-lg px-4 shadow-sm fixed-top bg-white">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="/member/dashboard">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        </a>


        <div class="d-flex align-items-center gap-3">
            <a href="/member/wallet" class="nav-link fw-semibold text-danger">Saldo</a>
            <a href="/member/transactions" class="nav-link fw-semibold text-danger">History</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>