<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .navbar-brand{
            font-size:42px;
            font-weight:700;
            color:#59d61a;
        }

        .nav-link{
            color:black;
            font-weight:500;
            margin-right:30px;
        }

        .nav-link.active{
            color:#59d61a !important;
        }

        .contact-section{
            padding:80px 0;
        }

        .contact-card{
            background:white;
            border-radius:25px;
            padding:50px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .contact-title{
            font-size:50px;
            font-weight:700;
            color:#59d61a;
        }

        .btn-send{
            background:#59d61a;
            color:white;
            border:none;
            border-radius:30px;
            padding:12px 35px;
            font-weight:600;
        }

        .btn-send:hover{
            background:black;
            color:white;
            transition:.3s;
        }

        .form-control{
            border-radius:15px;
            padding:12px;
        }

        textarea{
            resize:none;
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg py-4">

        <div class="container">

            <a class="navbar-brand"
            href="/">
                carikost
            </a>

            <div class="collapse navbar-collapse justify-content-center">

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

    <section class="contact-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="contact-card">

                        <h1 class="contact-title text-center">
                            Contact Us
                        </h1>

                        <p class="text-center text-muted mb-5">
                            Ada pertanyaan atau masukan?
                            Silakan hubungi kami.
                        </p>

                        @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        @endif

                        @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                        @endif

                        <form action="{{ route('contact.store') }}"
                            method="POST">

                        ```
                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Nama
                            </label>

                            <input type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Pesan
                            </label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="5"
                                placeholder="Tulis pesan anda..."></textarea>

                        </div>

                        <div class="text-center">

                            <button type="submit"
                                    class="btn-send">
                                Kirim Pesan
                            </button>

                        </div>
                        ```

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>
</html>