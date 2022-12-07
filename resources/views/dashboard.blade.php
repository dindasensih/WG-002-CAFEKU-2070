@extends('template')
@section('content')
    <div class="container mt-3">
        <div class="row align-items-start">
            <div class="col-lg-6">
                <div class="card shadow">
                    <form action="{{ route('order', []) }}" method="post" class="card">
                        @csrf
                        <div class="card-header text-center">Order</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="">Pesanan</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="pesanan[]" value="cappucino" type="checkbox"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Cappucino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pesanan[]" value="Americano" type="checkbox"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Americano
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pesanan[]" value="V60" type="checkbox"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        V60
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option selected value="" disabled>Pilih Status</option>
                                    <option value="Member">Member</option>
                                    <option value="Non Member">Non Member</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header text-center">Detail Order</div>
                    <div class="card-body">
                        @isset($data)
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['jumlah'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['total'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pembayaran</label>
                                <input type="number" class="form-control" value="{{ $data['total_order'] }}" readonly>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
