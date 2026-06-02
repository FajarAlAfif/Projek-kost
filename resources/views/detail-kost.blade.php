<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $kost->nama_kost }}</title>

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
    font-size:40px;
    font-weight:700;
    color:#59d61a;
}

.main-image{
    width:100%;
    height:500px;
    object-fit:cover;
    border-radius:20px;
}

.thumb{
    width:100%;
    height:120px;
    object-fit:cover;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}

.thumb:hover{
    transform:scale(1.05);
}

.detail-card{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.price{
    color:#59d61a;
    font-size:45px;
    font-weight:700;
}

.facility{
    background:#f5f5f5;
    border-radius:12px;
    padding:10px;
    text-align:center;
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
id="mainImage"
src="{{ asset('uploads/kost/'.$kost->images->first()->image) }}"
class="main-image">

@endif

<div class="row mt-3">

@foreach($kost->images as $image)

<div class="col-3">

<img
src="{{ asset('uploads/kost/'.$image->image) }}"
class="thumb"
onclick="changeImage(this.src)"
style="cursor:pointer">

</div>

@endforeach

</div>

<div class="detail-card mt-4">

<h3>Deskripsi Kost</h3>

<p class="mt-3">
{{ $kost->deskripsi }}
</p>

</div>

</div>

<div class="col-lg-5">

<div class="detail-card">

<h2>
{{ $kost->nama_kost }}
</h2>

<p>
📍 {{ $kost->daerah }}
</p>

<p>
⭐ {{ $kost->rating }}
</p>

<hr>

<div class="price">
Rp{{ number_format($kost->harga,0,',','.') }}
</div>

<p>/ bulan</p>

<hr>

<h5>Fasilitas Kost</h5>

<div class="row mt-3">

@if($kost->wifi)
<div class="col-6 mb-3">
    <div class="facility">
        📶 WiFi
    </div>
</div>
@endif

@if($kost->ac)
<div class="col-6 mb-3">
    <div class="facility">
        ❄ AC
    </div>
</div>
@endif

@if($kost->kamar_mandi)
<div class="col-6 mb-3">
    <div class="facility">
        🚿 Kamar Mandi Dalam
    </div>
</div>
@endif

@if($kost->parkiran)
<div class="col-6 mb-3">
    <div class="facility">
        🏍 Parkiran
    </div>
</div>
@endif

@if($kost->dapur)
<div class="col-6 mb-3">
    <div class="facility">
        🍳 Dapur
    </div>
</div>
@endif

@if($kost->laundry)
<div class="col-6 mb-3">
    <div class="facility">
        👕 Laundry
    </div>
</div>
@endif

@if($kost->cctv)
<div class="col-6 mb-3">
    <div class="facility">
        📹 CCTV
    </div>
</div>
@endif

</div>

</div>

<a href="/booking/{{ $kost->id }}"
   class="btn btn-success w-100 py-3">

    Pesan Kost

</a>

</div>

</div>

</div>

</div>
<script>

function changeImage(src)
{
    document
        .getElementById('mainImage')
        .src = src;
}

</script>
</body>
</html>