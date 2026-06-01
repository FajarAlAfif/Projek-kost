<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carikost</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-color: #f5f5f5;
        }

        .navbar-brand{
            font-size: 45px;
            font-weight: 700;
            color: #59d61a;
        }

        .nav-link{
            color: black;
            font-weight: 500;
            margin-right: 30px;
        }

        .nav-link.active{
            color: #59d61a !important;
        }

        .btn-sign{
            background: #d9d9d9;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            border: none;
            text-decoration: none;
            color: black;
        }

        .hero{
            padding-top: 80px;
        }

        .hero-title{
            font-size: 70px;
            font-weight: 700;
            line-height: 1.2;
        }

        .hero-desc{
            margin-top: 30px;
            color: #444;
            font-size: 18px;
        }

        .btn-kost{
            margin-top: 30px;
            background: #59d61a;
            color: white;
            border-radius: 40px;
            padding: 15px 40px;
            border: none;
            font-weight: 600;
        }

        .stats{
            margin-top: 80px;
        }

        .stats h2{
            font-weight: 700;
        }

        .stats p{
            margin-top: 20px;
            font-size: 20px;
        }

        .hero-img{
            width: 100%;
            max-width: 500px;
        }

        .profile-btn{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            background: #59d61a;
            color: white;
            font-size: 22px;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-4">

        <div class="container">

            <a class="navbar-brand" href="#">
                carikost
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-center"
                 id="navbarNav">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            HOME
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contact Us
                        </a>
                    </li>

                </ul>

            </div>

            <!-- LOGIN / PROFILE -->

            @if(session('login'))

            <div class="dropdown">

                <button class="profile-btn dropdown-toggle"
                        data-bs-toggle="dropdown">

                    👤

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item"
                           href="/profile">

                            Profile

                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="/logout">

                            Logout

                        </a>
                    </li>

                </ul>

            </div>

            @else

            <a href="/login" class="btn-sign">
                Sign In
            </a>

            @endif

        </div>

    </nav>

    <!-- Hero -->
    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <!-- Kiri -->
                <div class="col-lg-6">

                    <h1 class="hero-title">
                        Cari kosan <br>
                        nyaman & Harga <br>
                        Terjangkau
                    </h1>

                    <p class="hero-desc">
                        Ayo cari kost didaerah anda dengan harga terjangkau
                        dan fasilitas yang berkualitas
                    </p>

                    <button class="btn-kost">
                        Cari Kost
                    </button>

                    <!-- Statistik -->
                    <div class="row stats text-center">

                        <div class="col-4">
                            <h2>12,573</h2>
                            <p>Kost</p>
                        </div>

                        <div class="col-4">
                            <h2>326</h2>
                            <p>Award</p>
                        </div>

                        <div class="col-4">
                            <h2>12M+</h2>
                            <p>Pengguna</p>
                        </div>

                    </div>

                </div>

                <!-- Kanan -->
                <div class="col-lg-6 text-center">

                    <img src="https://cdn-icons-png.flaticon.com/512/619/619153.png"
                         class="hero-img"
                         alt="Rumah">

                </div>

            </div>

        </div>

    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>