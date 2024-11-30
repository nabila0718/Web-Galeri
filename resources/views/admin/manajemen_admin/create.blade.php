@extends('admin.layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">✨ Tambah Admin Baru</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-person-plus-fill"></i> Form Tambah Admin</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">🧑 Nama</label>
                    <input type="text" name="name" class="form-control border-primary shadow-sm" id="name" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Input Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">📧 Email</label>
                    <input type="email" name="email" class="form-control border-primary shadow-sm" id="email" placeholder="Masukkan email aktif" required>
                </div>

                <!-- Input Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">🔒 Password</label>
                    <input type="password" name="password" class="form-control border-primary shadow-sm" id="password" placeholder="Masukkan password" required>
                </div>

                <!-- Input Konfirmasi Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-bold">🔑 Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control border-primary shadow-sm" id="password_confirmation" placeholder="Masukkan ulang password" required>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
