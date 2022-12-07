@extends('template')
@section('content')

   {{-- membuat form edit kategori --}}

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Kategori</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('kategori.update', $data->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="" name="nama" value="{{ $data->nama }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
