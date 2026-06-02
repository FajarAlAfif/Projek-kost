@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Pesan Masuk
</h2>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                </tr>
            </thead>

            <tbody>

                @forelse($messages as $message)

                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                </tr>

                @empty

                <tr>
                    <td colspan="3" class="text-center">
                        Belum ada pesan
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection