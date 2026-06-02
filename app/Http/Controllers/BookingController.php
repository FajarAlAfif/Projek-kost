<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kost;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        $kost = Kost::findOrFail($id);

        return view('booking.create', compact('kost'));
    }

    public function store(Request $request)
    {
        Booking::create([
            'user_id' => session('user_id'),
            'kost_id' => $request->kost_id,
            'booking_date' => $request->booking_date,
            'status' => 'pending'
        ]);

        return redirect('/profile')
            ->with('success', 'Booking berhasil dikirim');
    }

    public function index()
    {
        $bookings = Booking::latest()->get();

        return view(
            'admin.booking.index',
            compact('bookings')
        );
    }

    public function verify($id)
    {
        Booking::findOrFail($id)
            ->update([
                'status' => 'verified'
            ]);

        return back();
    }

    public function reject($id)
    {
        Booking::findOrFail($id)
            ->update([
                'status' => 'rejected'
            ]);

        return back();
    }
}
