<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Carikost</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f5f7f2;
        }

        .navbar-brand{
            font-size:42px;
            font-weight:700;
            color:#17b100;
        }

        .hero{
            padding:60px 0;
            background:white;
        }

        .hero-title{
            font-size:70px;
            font-weight:700;
            color:#17b100;
        }

        .hero-sub{
            font-size:55px;
            font-weight:700;
        }

        .search-box{
            background:white;
            border-radius:50px;
            padding:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            margin-top:30px;
        }

        .search-input{
            border:none;
            box-shadow:none !important;
        }

        .btn-search{
            background:#17b100;
            color:white;
            border:none;
            border-radius:30px;
            width:120px;
        }

        .feature{
            background:white;
            border-radius:15px;
            padding:15px;
            text-align:center;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        .section-title{
            font-size:40px;
            font-weight:700;
        }

        .kost-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        .kost-img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .price{
            color:#17b100;
            font-size:28px;
            font-weight:700;
        }

        .nav-link{
            color:black;
            font-weight:500;
            margin-right:30px;
        }

        .nav-link.active{
            color:#17b100 !important;
        }
        </style>

</head>
<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg bg-white py-3">

    <div class="container">

        <a href="/" class="navbar-brand">
            carikost
        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-center"
            id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('search') ? 'active' : '' }}"
                    href="/search">
                        Search
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                    href="/contact">
                        Contact Us
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

        <div class="col-lg-7">

        <h1 class="hero-title">
        carikost
        </h1>

        <h2 class="hero-sub">
        Ayo cari kost mu!!
        </h2>

        <p class="mt-3 fs-5">
        Temukan kost nyaman, bersih dan terjangkau
        sesuai kebutuhanmu
        </p>

        <div class="row mt-4">

        <div class="col-md-4">
            <div class="feature">
            Harga Terjangkau
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature">
            Lokasi Strategis
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature">
            Aman & Nyaman
            </div>
        </div>

        </div>

        <div class="search-box">

        <form>

            <div class="row">

                <div class="col-md-9">

                    <input
                    type="text"
                    class="form-control search-input"
                    placeholder="Cari kost berdasarkan lokasi, nama, dll">

                </div>

                <div class="col-md-3">

                    <button class="btn btn-search w-100">
                    Cari
                    </button>

                </div>

            </div>

        </form>

        </div>

        </div>

        <div class="col-lg-5 text-center">

        <img
        src="https://cdn-icons-png.flaticon.com/512/619/619153.png"
        class="img-fluid">

        </div>

        </div>

    </div>

</section>

<!-- LIST KOST -->

<!-- LIST KOST -->

<section class="py-5">

    <div class="container">

        <h2 class="section-title">
            Rekomendasi Kost
        </h2>

        <p class="text-muted">
            Pilih kost terbaik sesuai kebutuhanmu
        </p>

        <div class="row mt-4">

            @forelse($kosts as $kost)

            <div class="col-lg-4 mb-4">

                <a href="{{ route('kost.detail', $kost->id) }}"
                   class="text-decoration-none text-dark">

                    <div class="kost-card">

                        @if($kost->images->count())

                        <img
                            src="{{ asset('uploads/kost/'.$kost->images->first()->image) }}"
                            class="kost-img">

                        @else

                        <img
                            src="https://via.placeholder.com/400x250"
                            class="kost-img">

                        @endif

                        <div class="p-3">

                            <h4>
                                {{ $kost->nama_kost }}
                            </h4>

                            <p>
                                <i class="bi bi-geo-alt-fill text-success"></i>
                                {{ $kost->daerah }}
                            </p>

                            <div class="price">
                                Rp{{ number_format($kost->harga,0,',','.') }}
                            </div>

                            <p class="mt-2">
                                {{ $kost->deskripsi }}
                            </p>

                            <div>
                                ⭐ {{ $kost->rating }}
                            </div>

                        </div>

                    </div>

                </a>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-success text-center">

                    <h4>Belum Ada Data Kost</h4>

                    <p>
                        Silahkan tambahkan data dari panel admin.
                    </p>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>