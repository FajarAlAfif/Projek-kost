<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Carikost</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-image: url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267');
            background-size: cover;
            background-position: center;
            height: 100vh;
            overflow: hidden;
        }

        .overlay{
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.4);

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card{
            width: 400px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);

            border-radius: 20px;
            padding: 40px;

            border: 1px solid rgba(255,255,255,0.2);

            color: white;
        }

        .login-title{
            text-align: center;
            font-size: 35px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .form-control{
            height: 50px;
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder{
            color: #eee;
        }

        .form-control:focus{
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: none;
        }

        .btn-login{
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 10px;

            background: #59d61a;
            color: white;

            font-weight: 600;
            margin-top: 20px;
        }

        .back-home{
            text-decoration: none;
            color: white;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <div class="overlay">

        <div class="login-card">

            <h1 class="login-title">
                Login
                @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

                @endif
            </h1>
            <div class="text-center mt-3">

                <span style="color:white;">
                    Belum punya akun?
                </span>

                <a href="/register"
                style="color:#59d61a;
                        font-weight:bold;
                        text-decoration:none;">

                    Register

                </a>

            </div>
            <form action="/login" method="POST">

                @csrf

                <div class="mb-3">
                    <input type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        required>
                </div>

                <div class="mb-3">
                    <input type="password"
                        name="password"
                        class="form-control"
                        placeholder="Password"
                        required>
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>

            </form>

            <a href="/" class="back-home">
                Kembali ke Home
            </a>

        </div>

    </div>

</body>
</html>