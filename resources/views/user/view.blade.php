@extends('template')
@section('content')
    {{-- membuat tombol untuk penambahan user --}}
    <div class="container mt-3">
        <a href="{{ url('users/create') }}" class="btn btn-primary">Tambah User</a>
        {{-- membuat tabel view user --}}
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">User</div>
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- membuat perulangan untuk pembacaan isi table --}}
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['role'] }}</td>
                                    <td><a href="{{ url('users/' . $item->id . '/edit') }}"class="btn btn-primary">Edit</a>
                                        <a
                                            href="{{ url('users/' . $item->id . '/delete') }}"class="btn btn-secondary">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection
