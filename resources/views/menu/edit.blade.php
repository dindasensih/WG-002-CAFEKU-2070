@extends('template')
@section('content')
    {{-- membuat form edit menu --}}

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Menu</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('menu.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="" name="nama"
                                    value="{{ $data->nama }}">
                            </div>
                            <div class="form-grup">
                                <label for="">Input Foto</label>
                                <div class="col">
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label mt-2">Harga</label>
                                    <input type="number" class="form-control" id="" name="harga"
                                        value="{{ $data->harga }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="" name="keterangan"
                                        value="{{ $data->keterangan }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Kategori</label>
                                    <select class="form-select @error('kategori_id') is-invalid @enderror"
                                        aria-label="Default select example" name="kategori_id">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" @selected($data->kategori_id == $item->id)>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
