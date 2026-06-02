<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Booking Kost</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#f5f5f5;
}

.navbar-brand{
    font-size:40px;
    font-weight:700;
    color:#59d61a;
}

.kost-image{
    width:100%;
    height:450px;
    object-fit:cover;
    border-radius:20px;
}

.card-custom{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.price{
    font-size:45px;
    color:#59d61a;
    font-weight:700;
}

.btn-booking{
    background:#59d61a;
    color:white;
    border:none;
    border-radius:12px;
    padding:15px;
    font-weight:600;
    width:100%;
}

.btn-booking:hover{
    background:black;
    color:white;
}

</style>

</head>
<body>

<nav class="navbar bg-white py-3">

<div class="container">

<a href="/" class="navbar-brand">
carikost
</a>

</div>

</nav>

<div class="container py-5">

<div class="row">

<div class="col-lg-7">

@if($kost->images->count())

<img
src="{{ asset('uploads/kost/'.$kost->images->first()->image) }}"
class="kost-image">

@endif

<div class="card-custom mt-4">

<h2>
{{ $kost->nama_kost }}
</h2>

<p class="text-muted">
📍 {{ $kost->daerah }}
</p>

<p>
{{ $kost->deskripsi }}
</p>

</div>

</div>

<div class="col-lg-5">

<div class="card-custom">

<h3>
Booking Kost
</h3>

<hr>

<div class="price">
Rp{{ number_format($kost->harga,0,',','.') }}
</div>

<p>
/ Bulan
</p>

<hr>

<form action="/booking/store"
      method="POST">


@csrf

<input
    type="hidden"
    name="kost_id"
    value="{{ $kost->id }}">

<div class="mb-3">

    <label>
        Nama Pemesan
    </label>

    <input
        type="text"
        class="form-control"
        value="{{ session('username') }}"
        readonly>

</div>

<div class="mb-3">

    <label>
        Tanggal Booking
    </label>

    <input
        type="date"
        name="booking_date"
        class="form-control"
        required>

</div>

<div class="mb-3">

    <label>
        Status
    </label>

    <input
        type="text"
        class="form-control"
        value="Pending"
        readonly>

</div>

<button class="btn-booking">
    Kirim Booking
</button>


</form>

</div>

</div>

</div>

</div>

</body>
</html>
