<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #f4f4f4;
        }

        .profile-wrapper{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .profile-card{
            width: 100%;
            max-width: 1300px;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        /* SIDEBAR */

        .sidebar{
            background: #59d61a;
            color: white;
            min-height: 850px;
            padding: 40px 30px;
        }

        .profile-icon{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);

            display: flex;
            align-items: center;
            justify-content: center;

            margin: auto;
            font-size: 50px;
        }

        .welcome-text{
            text-align: center;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .menu-item{
            display: flex;
            align-items: center;

            gap: 15px;

            color: white;
            text-decoration: none;

            padding: 14px 18px;
            border-radius: 12px;

            margin-bottom: 10px;

            transition: 0.3s;
        }

        .menu-item:hover{
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .menu-item.active{
            background: rgba(255,255,255,0.2);
        }

        .logout{
            margin-top: 80px;
        }

        /* CONTENT */

        .content{
            padding: 50px;
        }

        .page-title{
            text-align: center;
            color: #d0d0d0;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .section-title{
            color: #d0d0d0;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .form-label{
            font-size: 14px;
            font-weight: 500;
        }

        .form-control,
        .form-select{
            height: 50px;
            border-radius: 12px;
            background: #f7f7f7;
            border: none;
        }

        .save-btn{
            background: #1ea0ff;
            color: white;
            border: none;

            height: 50px;

            border-radius: 12px;

            font-weight: 600;
            width: 100%;
        }

        .save-btn:hover{
            background: #0f8ae4;
        }

        @media(max-width: 992px){

            .sidebar{
                min-height: auto;
            }

            .content{
                padding: 30px;
            }

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

                        <h5>
                            Welcome, {{ session('username') }}
                        </h5>

                    </div>

                    <a href="#" class="menu-item active">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>

                    <a href="#" class="menu-item">
                        <i class="bi bi-file-earmark"></i>
                        New Translation
                    </a>

                    <a href="#" class="menu-item">
                        <i class="bi bi-folder"></i>
                        History
                    </a>

                    <a href="#" class="menu-item">
                        <i class="bi bi-credit-card"></i>
                        Billing & Payment
                    </a>

                    <a href="#" class="menu-item">
                        <i class="bi bi-gear"></i>
                        Settings
                    </a>

                    <!-- LOGOUT -->
                    <a href="/logout" class="menu-item logout">
                        <i class="bi bi-box-arrow-left"></i>
                        Log Out
                    </a>

                </div>

            </div>

            <!-- CONTENT -->
            <div class="col-lg-9">

                <div class="content">

                    <h3 class="page-title">
                        Your personal profile info
                    </h3>

                    <!-- FORM -->
                    <form action="/update-profile" method="POST">

                        @csrf

                        <div class="row">

                            <!-- PROFILE -->
                            <div class="col-lg-6">

                                <h4 class="section-title">
                                    PROFILE
                                </h4>

                                <div class="mb-3">

                                    <label class="form-label">
                                        First name
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           placeholder="Name">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Last name
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           placeholder="Surname">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Username
                                    </label>

                                    <input type="text"
                                           name="username"
                                           class="form-control"
                                           value="{{ session('username') }}"
                                           placeholder="Username">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Your email
                                    </label>

                                    <input type="email"
                                           class="form-control"
                                           placeholder="mail@example.com">

                                </div>

                            </div>

                            <!-- PASSWORD -->
                            <div class="col-lg-6">

                                <h4 class="section-title">
                                    PASSWORD
                                </h4>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Old password
                                    </label>

                                    <input type="password"
                                           class="form-control"
                                           placeholder="********">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        New password
                                    </label>

                                    <input type="password"
                                           class="form-control"
                                           placeholder="********">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Confirm password
                                    </label>

                                    <input type="password"
                                           class="form-control"
                                           placeholder="********">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Country, City
                                    </label>

                                    <select class="form-select">

                                        <option>
                                            Indonesia, Batam
                                        </option>

                                        <option>
                                            Indonesia, Jakarta
                                        </option>

                                    </select>

                                </div>

                                <button class="save-btn">
                                    Correct. Save Info
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>