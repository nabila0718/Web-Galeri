@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Tambah Galeri Foto</h1>
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Tambah Galeri</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('galleries.store') }}" method="post">
                @csrf

                <!-- Post Selection -->
                <div class="mb-3">
                    <label for="post_id" class="form-label fw-bold">Judul Post</label>
                    <select name="post_id" id="post_id" class="form-control shadow-sm" required>
                        <option value="">Pilih Post</option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Position Input -->
                <div class="row">
                    <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="position" class="form-label fw-bold">Posisi</label>
                            <input type="number" name="position" id="position" class="form-control shadow-sm" required>
                            <small class="text-muted">Nilai posisi harus berupa angka.</small>
                        </div>
                    </div>

                    <!-- Status Input -->
                    <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-control shadow-sm" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak-aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
