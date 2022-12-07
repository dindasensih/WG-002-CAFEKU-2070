@extends('template')
@section('content')
    {{-- membuat form create user --}}

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tambah User</div>
                    <div class="card-body">
                        <form action="{{url('users')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="" name="name" value="{{ old('name')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" id="" name="email" value="{{ old('email')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Role</label>
                                <div class="col">
                                    <select class="form-control" name="role">
                                        <option selected value="" disabled>Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="" name="password" value="{{ old('password')}}">
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
