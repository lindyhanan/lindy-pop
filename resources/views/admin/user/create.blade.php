@extends('layouts.admin.app')

@section('title', 'Tambah User')

@section('header')
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap mb-4">
        <div>
            <h1 class="h4">Tambah User</h1>
            <p class="mb-0">Masukkan data user baru beserta profile picture.</p>
        </div>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-success text-white">
                <i class="far fa-question-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card-body">
        <h5 class="card-title mb-4">Input Data User</h5>

        @if (session('success'))
            <div class="alert alert-info">{!! session('success') !!}</div>
        @endif

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-4 col-sm-12 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Masukkan Nama" required>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Masukkan Email" required>
                </div>

                <div class="mb-3">
                    <label for="role">Role</label>
                    <select class="form-select" name="role" id="role" required>
                        <option value="" selected>Pilih Role</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Pelanggan">Pelanggan</option>
                        <option value="Mitra">Mitra</option>
                    </select>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan Password" required>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Konfirmasi Password" required>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-dark me-2">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-light border">Batal</a>
            </div>
        </form>
    </div>
@endsection
