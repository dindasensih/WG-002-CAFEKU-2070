@extends('template')

@section('content')
    {{-- membuat tombol untuk menambahkan kategori --}}
    <div class="container mt-3">
        <a href="{{ url('kategori/create') }}" class="btn btn-primary">Tambah Kategori</a>

        {{-- membuat tabel view kategori --}}
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">Kategori</div>
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- membuat perulangan untuk pembacaan isi table --}}
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['nama'] }}</td>
                                    <td><a
                                            href="{{ url('kategori/' . $item->id . '/edit') }}"class="btn btn-primary">Edit</a>
                                        <a
                                            href="{{ url('kategori/' . $item->id . '/delete') }}"class="btn btn-secondary">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection