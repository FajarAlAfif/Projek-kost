@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Verifikasi Booking
</h2>

<div class="card">

<div class="card-body">

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>User ID</th>
                <th>Kost ID</th>
                <th>Tanggal Booking</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($bookings as $booking)

            <tr>

                <td>{{ $booking->user_id }}</td>

                <td>{{ $booking->kost_id }}</td>

                <td>{{ $booking->booking_date }}</td>

                <td>

                    @if($booking->status == 'pending')
                        🟡 Pending
                    @elseif($booking->status == 'verified')
                        🟢 Verified
                    @else
                        🔴 Rejected
                    @endif

                </td>

                <td>

                    @if($booking->status == 'pending')

                    <form
                        action="/admin/booking/{{ $booking->id }}/verify"
                        method="POST"
                        style="display:inline;">

                        @csrf

                        <button class="btn btn-success btn-sm">
                            Verifikasi
                        </button>

                    </form>

                    <form
                        action="/admin/booking/{{ $booking->id }}/reject"
                        method="POST"
                        style="display:inline;">

                        @csrf

                        <button class="btn btn-danger btn-sm">
                            Tolak
                        </button>

                    </form>

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="text-center">
                    Belum ada booking
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
