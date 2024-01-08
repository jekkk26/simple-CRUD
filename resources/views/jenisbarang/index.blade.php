@extends('layout')

@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Daftar Jenis Barang</h1>
        </header>
        <main>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="/create/jenisbarang" type="button" class="btn btn-dark mb-4">Tambah Data Barang</a>
            <a href="/barang" type="button" class="btn btn-dark mb-4">Data Barang</a>
            <a href="/barang/barangdanjenis" type="button" class="btn btn-dark mb-4">Data Jenis & Barang</a>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Jenis</th>
                        <th scope="col">Nama Jenis Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisbarang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id_jenis }}</td>
                            <td>{{ $item->nama_jenis_barang }}</td>
                            <td>
                                <a href="/edit/jenis/{{ $item->id_jenis}}" class="btn btn-dark btn-sm">Edit</a>
                                <a href="/destroy/jenisbarang/{{ $item->id_jenis }}" class="btn btn-dark btn-sm">Hapus</a>
                                {{-- @dump($item); --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
@endsection