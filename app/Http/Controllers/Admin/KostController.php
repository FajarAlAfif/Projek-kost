<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\KostImage;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::with('images')->latest()->get();

        return view('admin.kost.index', compact('kosts'));
    }

    public function create()
    {
        return view('admin.kost.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kost' => 'required',
            'alamat' => 'required',
            'daerah' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'image' => 'required|image'
        ]);

        $kost = Kost::create([
            'user_id' => auth()->id(),
            'nama_kost' => $request->nama_kost,
            'alamat' => $request->alamat,
            'daerah' => $request->daerah,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'rating' => 0
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '_' .
                        $file->getClientOriginalName();

            $file->move(
                public_path('uploads/kost'),
                $filename
            );

            KostImage::create([
                'kost_id' => $kost->id,
                'image' => $filename
            ]);
        }

        return redirect()
            ->route('admin.kost.index')
            ->with('success', 'Data berhasil ditambahkan');
    }
}