@extends('layout')

@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Tambah Barang dan Jenis Barang</h1>
        </header>
        <main>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/store/barangjenisbarang" method="POST">
                @csrf

                <div class="mb-3 row">
                    <label for="idbarangjenisbarang" class="col-sm-3 col-form-label">ID</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="idbarangjenisbarang" name="idbarangjenisbarang" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kode_barang">Kode Barang:</label>
                    <select name="kode_barang" class="form-control">
                        @foreach ($barang as $barangItem)
                            <option value="{{ $barangItem->kode_barang }}">{{ $barangItem->kode_barang }} - {{ $barangItem->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_jenis">ID Jenis:</label>
                    <select name="id_jenis" class="form-control">
                        @foreach ($jenis as $jenisItem)
                            <option value="{{ $jenisItem->id_jenis }}">{{ $jenisItem->id_jenis }} - {{ $jenisItem->nama_jenis_barang }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Tambah</button>
                    <a href="/barang/barangdanjenis" class="btn btn-dark btn-block mt-2">Kembali</a>
                </div>
            </form>
        </main>
    </div>
@endsection