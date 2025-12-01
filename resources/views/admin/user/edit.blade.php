@extends('layouts.admin.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
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

                <div class="mb-3">
                    <label>Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control">
                </div>

                @if ($user->profile_picture)
                    <div>
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" width="120" class="mt-2 rounded">
                    </div>
                @endif

                <div class="d-flex gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
