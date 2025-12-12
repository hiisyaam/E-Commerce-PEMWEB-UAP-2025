<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ethereal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .fixed-nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    background-color: #FFFFFF;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
#bannerCarousel {
    margin-top: 90px; 
}
        body {
            background-color: #FFFFFF;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #FFFFFF;
        }

        .navbar-brand, .nav-link {
            color: #A4133C !important;
            font-weight: 600;
        }
        .category-card {
            background-color: #FFF0F3;
            border-radius: 10px;
            padding: 20px;
            transition: 0.3s;
            cursor: pointer;
            border: 1px solid #f5d7dd;
        }
        .category-card:hover {
            background-color: #A4133C;
            color: white;
            transform: translateY(-5px);
        }
        .product-card {
            background-color: #FFF0F3;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #A4133C !important;
            border: none;
        }


.btn-ethereal {
    padding: .20rem .6rem;
    border-radius: 5px;
    font-weight: 600;
    transition: background-color .2s ease, color .2s ease, transform .15s ease;
}

.btn-login {
    background: #A4133C;
    color: white;
    border: 1px solid #A4133C;
    transition: 0.2s ease;
    font-weight: 400;
}

.btn-login:hover {
    background: #8f0f32;
    border-color: #8f0f32;
    color: #fff;
    transform: translateY(-2px);
}


.btn-register {
    background: #FFFFFF;
    color: #A4133C;
    border: 2px solid #A4133C;
    transition: 0.2s ease;
    font-weight: 400;
}

.btn-register:hover {
    background: #A4133C;
    color: #FFFFFF;
    transform: translateY(-2px);
}


.banner-img {
    width: 100%;
    height: 55vh;
    object-fit: cover;
}

.banner-img {
    width: 100%;
    height: auto;
}

.text-shadow-title {
color: #A4133C;
text-shadow: 0 3px 8px #FFFFFF;
}

.text-shadow-desc {
color: #fff;
text-shadow: 0 3px 8px rgba(0,0,0,0.7);
}

.kategori-produk {
    text-align: center;
    margin: 40px 0;
}

.kategori-produk h2 {
    font-weight: 700;
    color: #A4133C;
    text-align: center;
    margin-bottom: 25px; 
    margin-top: 40px;    
}


.kategori-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: nowrap; 
}

.kategori-item {
    text-align: center;
}

.kategori-item img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    transition: 0.3s ease;
    cursor: pointer;
    border: 3px solid transparent; 
}

.kategori-item:hover img {
    border-color: #A4133C;
    box-shadow: 0 0 12px rgba(164, 19, 60, 0.4);
    transform: scale(1.03);
}


.kategori-item::after {
    content: none !important;
}

.kategori-item p {
    margin-top: 12px;
    font-size: 16px;
    font-weight: 400; 
    color: #333;
}


.kategori-link {
    text-decoration: none;
    color: inherit;
}

.btn-detail {
    background-color: #A4133C !important;
    color: white !important;
    border: none;
    font-weight: 600;
    border-radius: 14px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-detail:hover {

    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(164, 19, 60, 0.3);
}

.product-card .card-title {
    min-height: 48px;
    font-size: 14px;  
    line-height: 1.3;
}

.product-card .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-card .card-text {
    font-size: 14px;
    margin-bottom: 12px;
}
.product-category {
    font-size: 14px;
    font-weight: 500;
    color: #A4133C;
    margin-bottom: 5px;
    display: block;
}
.product-price {
    font-size: 15px;
    font-weight: 700; 
    color: #333;
    margin-bottom: 12px;
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

.footer-links {
    margin: 18px 0;
}


.footer-copy {
    color: #8f8f8f;
    font-size: 13px;
    margin-top: 10px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg shadow-sm px-4 fixed-nav">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/images/logo.png') }}" 
                 alt="Ethereal Stationery" 
                 style="width: 70px; height: auto;">
        </a>

        <div class="collapse navbar-collapse" id="navMenu">
            <div class="ms-auto d-flex gap-2">

                <a href="{{ route('login') }}" 
                   class="btn btn-ethereal btn-login">
                    Login
                </a>

                <a href="{{ route('register') }}" 
                   class="btn btn-ethereal btn-register">
                    Register
                </a>

            </div>
        </div>

    </div>
</nav>


<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
    </div>


    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('assets/images/banner 1.png') }}" 
                 class="d-block banner-img">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('assets/images/banner 2.png') }}" 
                 class="d-block banner-img">

            <div class="carousel-caption d-none d-md-block text-start">
                <h2 class="fw-bold text-shadow-title">Stationery Terlengkap</h2>
                <p class="fw-semibold mt-2 text-shadow-desc">
                    Temukan alat tulis terbaik dengan harga terjangkau.
                </p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('assets/images/banner 3.png') }}" 
                 class="d-block banner-img">

            <div class="carousel-caption d-none d-md-block text-start">
                <h2 class="fw-bold text-shadow-title">Stationery Terlengkap</h2>
                <p class="fw-semibold mt-2 text-shadow-desc">
                    Temukan alat tulis terbaik dengan harga terjangkau.
                </p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<section class="kategori-produk">
    <h2>Kategori Produk</h2>

    <div class="kategori-container">

        <a href="/kategori/pena" class="kategori-link">
            <div class="kategori-item">
                <img src="{{ asset('assets/images/pena1.jpg') }}" alt="Pena">
                <p>Pena</p>
            </div>
        </a>

        <a href="/kategori/pensil" class="kategori-link">
            <div class="kategori-item">
                <img src="{{ asset('assets/images/pensil1.jpg') }}" alt="Pensil">
                <p>Pensil</p>
            </div>
        </a>

        <a href="/kategori/buku" class="kategori-link">
            <div class="kategori-item">
                <img src="{{ asset('assets/images/buku1.jpg') }}" alt="Buku">
                <p>Buku</p>
            </div>
        </a>

        <a href="/kategori/highlighter" class="kategori-link">
            <div class="kategori-item">
                <img src="{{ asset('assets/images/highlighter1.jpg') }}" alt="Highlighter">
                <p>Highlighter</p>
            </div>
        </a>

        <a href="/kategori/washitape" class="kategori-link">
            <div class="kategori-item">
                <img src="{{ asset('assets/images/washitape1.jpg') }}" alt="Washi Tape">
                <p>Washi Tape</p>
            </div>
        </a>

    </div>
</section>


<section class="container my-5">
    <h3 class="fw-bold text-center mb-4" style="color: #A4133C;">Produk Terbaru</h3>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('assets/images/1/zebra-sarasa-1.jpg') }}" class="card-img-top">
                <div class="card-body">
                    
                <span class="product-category"> Kategori Pena</span>
                <h5 class="card-title">Pulpen Zebra Sarasa Clip 0.5 Retractable Gel Ink</h5>
                <p class="card-text">Rp 177.000</p>
                    <a href="{{ route('login') }}" class="btn btn-detail w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('assets/images/3/sidu-38-lembar.jpg') }}" class="card-img-top">
                <div class="card-body">
                <span class="product-category"> Kategori Buku</span>
                    <h5 class="card-title">Buku Tulis Sidu 38 Lembar (1 Pack Isi 10 Pcs)</h5>
                    <p class="card-text">Rp 35.000</p>
                    <a href="{{ route('login') }}" class="btn btn-detail w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('assets/images/5/castell-9000.jpg') }}" class="card-img-top">
                <div class="card-body">
                <span class="product-category"> Kategori Pensil</span>
                    <h5 class="card-title">Faber-Castell Pencil Castell 9000-2B</h5>
                    <p class="card-text">Rp 56.000</p>
                    <a href="{{ route('login') }}" class="btn btn-detail w-100">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('assets/images/9/washie-tape-pastel.jpeg') }}" class="card-img-top">
                <div class="card-body">
                <span class="product-category"> Kategori Washie Tape</span>
                    <h5 class="card-title">Washie Tape Dekorasi Pastel Kartun Lucu</h5>
                    <p class="card-text">Rp 30.000</p>
                    <a href="{{ route('login') }}" class="btn btn-detail w-100">Detail</a>
                </div>
            </div>
        </div>

    </div>
    </section>

    
<footer class="footer-ethereal mt-5">
    <div class="container text-center">

        <img src="{{ asset('assets/images/logo.png') }}" 
             alt="Ethereal Logo" 
             style="width: 80px; margin-bottom: 10px;">

        <p class="footer-text">
            Ethereal Stationery — Temukan alat tulis terbaik untuk kebutuhanmu.
        </p>

        <p class="footer-copy">© 2025 Ethereal Stationery. All rights reserved.</p>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
