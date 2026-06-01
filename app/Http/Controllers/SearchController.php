<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $kosts = Kost::with('images')->latest()->get();

        return view('search', compact('kosts'));
    }

    public function show(int $id)
    {
        $kost = Kost::with('images')->findOrFail($id);

        return view('detail-kost', compact('kost'));
    }
}