@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Tambah Kategori</h1>
        <a href="/categories" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Tambah Kategori</h5>
        </div>
        <div class="card-body">
            <form action="/categories" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Judul Kategori</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title" placeholder="Masukkan judul kategori" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
