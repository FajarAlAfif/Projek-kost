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

        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        <table class="table align-middle">

            <thead>

            <tr>
                <th>Foto</th>
                <th>Nama Kost</th>
                <th>Daerah</th>
                <th>Harga</th>
                <th>Rating</th>
                <th width="150">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @forelse($kosts as $kost)

            <tr>

                <td>

                    @if($kost->images->count())

                    <img
                        src="{{ asset('uploads/kost/'.$kost->images->first()->image) }}"
                        width="120"
                        class="rounded">

                    @endif

                </td>

                <td>
                    {{ $kost->nama_kost }}
                </td>

                <td>
                    {{ $kost->daerah }}
                </td>

                <td>
                    Rp {{ number_format($kost->harga,0,',','.') }}
                </td>

                <td>
                    ⭐ {{ $kost->rating }}
                </td>

                <td>

                    <form action="{{ route('admin.kost.destroy',$kost->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus kost ini?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada data kost

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection