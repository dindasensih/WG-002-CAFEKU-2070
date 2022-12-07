@extends('template')
@section('content')
    {{-- membuat tombol untuk penambahan menu --}}
    <div class="container mt-3">
        <a href="{{ url('menu/create') }}" class="btn btn-primary">Tambah Menu</a>
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">Menu</div>
            {{-- membuat tabel view menu --}}
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- membuat perulangan untuk pembacaan isi table --}}
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['nama'] }}</td>
                                    <td><img src="{{ asset('storage/' . $item->foto) }}" width="100px"></td>
                                    <td>{{ $item['harga'] }}</td>
                                    <td>{{ $item['keterangan'] }}</td>
                                    <td>{{ $item->kategori->nama }}</td>
                                    <td><a href="{{ url('menu/' . $item->id . '/edit') }}"class="btn btn-primary">Edit</a>
                                        <a
                                            href="{{ url('menu/' . $item->id . '/delete') }}"class="btn btn-secondary">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection
