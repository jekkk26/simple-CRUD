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

            <a href="/create/jenisbarang" type="button" class="btn btn-primary mb-4"> <i class="bi bi-plus-lg"></i>Tambah Data Barang</a>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jenis Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisbarang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_jenis_barang }}</td>
                            <td>
                                <a href="/edit/jenis/{{ $item->id_jenis}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>
                                <a href="/destroy/jenisbarang/{{ $item->id_jenis }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>Hapus</a>
                                {{-- @dump($item); --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/admin/admin" class="btn btn-success btn-block mt-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </main>
    </div>
@endsection
