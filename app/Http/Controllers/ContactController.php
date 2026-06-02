<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $user = User::where('name', $request->name)
                    ->where('email', $request->email)
                    ->first();

        if (!$user) {

            return back()->with(
                'error',
                'Nama atau Email tidak terdaftar'
            );
        }

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return back()->with(
            'success',
            'Pesan berhasil dikirim'
        );
    }

    public function admin()
    {
        $messages = ContactUs::latest()->get();

        return view(
            'admin.contact.index',
            compact('messages')
        );
    }
}
