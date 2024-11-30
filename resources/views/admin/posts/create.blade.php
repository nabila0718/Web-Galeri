@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold text-primary mb-4">✨ Buat Post Baru</h1>
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <form action="/posts" method="post">
                @csrf
                <!-- Input Judul Post -->
                <div class="form-group mb-4">
                    <label for="title" class="form-label fw-semibold">📝 Judul</label>
                    <input type="text" name="title" class="form-control border-primary" id="title" placeholder="Masukkan judul post..." required>
                </div>

                <!-- Input Kategori dan Status -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label fw-semibold">📂 Kategori</label>
                            <select name="category_id" id="category_id" class="form-select border-primary" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="status" class="form-label fw-semibold">📌 Status</label>
                            <select name="status" id="status" class="form-select border-primary" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Input Isi Post -->
                <div class="form-group mb-4">
                    <label for="content" class="form-label fw-semibold">🖋️ Isi</label>
                    <textarea name="content" id="content" class="form-control border-primary" rows="6" placeholder="Tulis isi post di sini..." required></textarea>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
