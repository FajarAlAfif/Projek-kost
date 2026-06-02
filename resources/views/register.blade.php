<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Carikost</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

    *{
        font-family:'Poppins',sans-serif;
    }

    body{
        background-image:url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267');
        background-size:cover;
        background-position:center;
        height:100vh;
        overflow:hidden;
    }

    .overlay{
        width:100%;
        height:100vh;
        background:rgba(0,0,0,.4);

        display:flex;
        justify-content:center;
        align-items:center;
    }

    .register-card{
        width:400px;
        background:rgba(255,255,255,.15);
        backdrop-filter:blur(10px);

        border-radius:20px;
        padding:40px;

        border:1px solid rgba(255,255,255,.2);

        color:white;
    }

    .register-title{
        text-align:center;
        font-size:35px;
        font-weight:700;
        margin-bottom:30px;
    }

    .form-control{
        height:50px;
        background:rgba(255,255,255,.2);
        border:none;
        color:white;
    }

    .form-control::placeholder{
        color:#eee;
    }

    .form-control:focus{
        background:rgba(255,255,255,.2);
        color:white;
        box-shadow:none;
    }

    .btn-register{
        width:100%;
        height:50px;
        border:none;
        border-radius:10px;

        background:#59d61a;
        color:white;

        font-weight:600;
        margin-top:20px;
    }

    .back-login{
        text-decoration:none;
        color:white;
        display:block;
        text-align:center;
        margin-top:20px;
    }

</style>
```

</head>
<body>

<div class="overlay">

```
<div class="register-card">

    <h1 class="register-title">
        Register
    </h1>

    @if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <form action="/register" method="POST">

        @csrf

        <div class="mb-3">

            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Nama Lengkap"
                required>

        </div>

        <div class="mb-3">

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Email"
                required>

        </div>

        <div class="mb-3">

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
                required>

        </div>

        <button type="submit" class="btn-register">
            Register
        </button>

    </form>

    <a href="/login" class="back-login">
        Sudah punya akun? Login
    </a>

</div>
```

</div>

</body>
</html>
