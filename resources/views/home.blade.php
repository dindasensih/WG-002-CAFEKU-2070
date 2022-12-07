@extends('template')
@section('content')
    {{-- menampilkan menu dalam bentuk card pada halaman home --}}

    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-4">
                    <div class="card shadow mt-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="foto" width=50px>
                            <p><i>Harga Rp. {{ $item['harga'] }}</i></p>
                            <p class="card-text">{{ $item['keterangan'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
