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
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp'
        ]);

        $kost = Kost::create([
            'user_id' => 4,

            'nama_kost' => $request->nama_kost,
            'alamat' => $request->alamat,
            'daerah' => $request->daerah,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,

            'rating' => 0,

            'wifi' => $request->has('wifi'),
            'ac' => $request->has('ac'),
            'kamar_mandi' => $request->has('kamar_mandi'),
            'parkiran' => $request->has('parkiran'),
            'dapur' => $request->has('dapur'),
            'laundry' => $request->has('laundry'),
            'cctv' => $request->has('cctv')
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $filename =
                    time().'_'.
                    rand(1000,9999).'_'.
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
        }

        return redirect()
            ->route('admin.kost.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $kost = Kost::with('images')->findOrFail($id);

        foreach ($kost->images as $image) {

            $path = public_path(
                'uploads/kost/' . $image->image
            );

            if (file_exists($path)) {
                unlink($path);
            }

            $image->delete();
        }

        $kost->delete();

        return redirect()
            ->route('admin.kost.index')
            ->with('success', 'Data kost berhasil dihapus');
    }
}
