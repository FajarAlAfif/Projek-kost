<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Booking Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f4f4;
}

.profile-wrapper{
    padding:30px;
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
    padding:40px 30px;
}

.menu-item{
    display:flex;
    gap:15px;
    color:white;
    text-decoration:none;
    padding:14px 18px;
    border-radius:12px;
    margin-bottom:10px;
}

.menu-item:hover{
    color:white;
    background:rgba(255,255,255,.15);
}

.menu-item.active{
    background:rgba(255,255,255,.2);
}

.content{
    padding:40px;
}

.booking-card{
    border-radius:15px;
    background:#f8f8f8;
    padding:20px;
    margin-bottom:20px;
}

.pending{
    color:orange;
    font-weight:700;
}

.verified{
    color:green;
    font-weight:700;
}

.rejected{
    color:red;
    font-weight:700;
}

</style>

</head>
<body>

<div class="profile-wrapper">

<div class="profile-card">

<div class="row g-0">

<div class="col-lg-3">

<div class="sidebar">

<h4>
{{ session('username') }}
</h4>

<hr>

<a href="/profile" class="menu-item">
    <i class="bi bi-person"></i>
    Profile
</a>

<a href="/my-booking" class="menu-item active">
    <i class="bi bi-calendar-check"></i>
    Booking Saya
</a>


</div>

</div>

<div class="col-lg-9">

<div class="content">

<h2 class="mb-4">
Booking Saya
</h2>

@forelse($bookings as $booking)

<div class="booking-card">

<h4>
{{ $booking->kost->nama_kost }}
</h4>

<p>
Tanggal Booking:
{{ $booking->booking_date }}
</p>

@if($booking->status == 'pending')

<p class="pending">
🟡 Pending
</p>
@endif

@if($booking->status == 'verified')

<p class="verified">
🟢 Verified
</p>
@endif

@if($booking->status == 'rejected')

<p class="rejected">
🔴 Rejected
</p>
@endif

</div>

@empty

<div class="alert alert-warning">
Belum ada booking
</div>

@endforelse

</div>

</div>

</div>

</div>

</div>

</body>
</html>
