@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Tambah Kost
</h2>

<div class="card card-custom">

    <div class="card-body">

        <form action="{{ route('admin.kost.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Nama Kost</label>
                <input type="text"
                       name="nama_kost"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Daerah (Hanya untuk sekitaran batam)</label>
                <input type="text"
                       name="daerah"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number"
                       name="harga"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Foto Kost</label>
                <input type="file"
                    name="image"
                    class="form-control">
            </div>

            <hr>

            <h5 class="mb-3">
                Fasilitas Kost
            </h5>

            <div class="row">

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="wifi"
                        value="1">
                    WiFi
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="ac"
                        value="1">
                    AC
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="kamar_mandi"
                        value="1">
                    Kamar Mandi Dalam
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="parkiran"
                        value="1">
                    Parkiran
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="dapur"
                        value="1">
                    Dapur
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="laundry"
                        value="1">
                    Laundry
                </div>

                <div class="col-md-4 mb-2">
                    <input type="checkbox"
                        name="cctv"
                        value="1">
                    CCTV
                </div>

            </div>

            <br>

            <button class="btn btn-green">
                Simpan Kost
            </button>
        </form>

    </div>

</div>

@endsection