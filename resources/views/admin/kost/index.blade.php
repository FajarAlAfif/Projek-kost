@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Daftar Kost
</h2>

<a href="{{ route('admin.kost.create') }}"
   class="btn btn-green mb-4">
    <i class="bi bi-plus-circle"></i>
    Tambah Kost
</a>

<div class="card card-custom">

    <div class="card-body">

        <table class="table align-middle">

            <thead>

            <tr>
                <th>Foto</th>
                <th>Nama Kost</th>
                <th>Daerah</th>
                <th>Harga</th>
                <th>Rating</th>
            </tr>

            </thead>

            <tbody>

            @forelse($kosts as $kost)

            <tr>

                <td>

                    @if($kost->images->count())

                    <img src="{{ asset('uploads/kost/'.$kost->images->first()->image) }}"
                         width="120">

                    @endif

                </td>

                <td>{{ $kost->nama_kost }}</td>

                <td>{{ $kost->daerah }}</td>

                <td>
                    Rp {{ number_format($kost->harga,0,',','.') }}
                </td>

                <td>{{ $kost->rating }}</td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data kost
                </td>
            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection