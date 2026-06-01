<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kost</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        .profile-wrapper{
            min-height:100vh;
            padding:20px;
        }

        .profile-card{
            background:white;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .sidebar{
            background:#59d61a;
            min-height:100vh;
            color:white;
            padding:40px 25px;
        }

        .profile-icon{
            width:100px;
            height:100px;
            border-radius:50%;
            background:rgba(255,255,255,.2);
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:50px;
            margin:auto;
        }

        .welcome-text{
            text-align:center;
            margin-top:20px;
            margin-bottom:40px;
        }

        .menu-item{
            display:flex;
            align-items:center;
            gap:12px;
            color:white;
            text-decoration:none;
            padding:14px;
            border-radius:12px;
            margin-bottom:10px;
            transition:.3s;
        }

        .menu-item:hover{
            background:rgba(255,255,255,.2);
            color:white;
        }

        .content{
            padding:40px;
        }

        .page-title{
            font-weight:700;
            color:#444;
            margin-bottom:30px;
        }

        .card-custom{
            border:none;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,.05);
        }

        .btn-green{
            background:#59d61a;
            color:white;
            border:none;
        }

        .btn-green:hover{
            background:#49b815;
            color:white;
        }

        .table img{
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="profile-wrapper">

    <div class="profile-card">

        <div class="row g-0">

            <!-- SIDEBAR -->

            <div class="col-lg-3">

                <div class="sidebar">

                    <div class="profile-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>

                    <div class="welcome-text">
                        <h5>Admin Kost</h5>
                    </div>

                    <a href="{{ route('admin.kost.index') }}"
                       class="menu-item">
                        <i class="bi bi-house-door"></i>
                        Daftar Kost
                    </a>

                    <a href="{{ route('admin.kost.create') }}"
                       class="menu-item">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Kost
                    </a>

                    <a href="#"
                       class="menu-item">
                        <i class="bi bi-star"></i>
                        Review Kost
                    </a>

                    <a href="#"
                       class="menu-item">
                        <i class="bi bi-gear"></i>
                        Pengaturan
                    </a>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="col-lg-9">

                <div class="content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>