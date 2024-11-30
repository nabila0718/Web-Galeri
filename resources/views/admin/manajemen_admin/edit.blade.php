@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Edit Admin</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Edit Admin</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama</label>
                    <input type="text" name="name" class="form-control shadow-sm" id="name" value="{{ $user->name }}" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control shadow-sm" id="email" value="{{ $user->email }}" placeholder="Masukkan email aktif" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control shadow-sm" id="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control shadow-sm" id="password_confirmation" placeholder="Masukkan ulang password baru">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
