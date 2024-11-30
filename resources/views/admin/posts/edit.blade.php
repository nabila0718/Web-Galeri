@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Edit Post</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Edit Post</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Judul</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title" value="{{ $post->title }}" placeholder="Masukkan judul post" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control shadow-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-control shadow-sm" required>
                                <option value="">Pilih Status</option>
                                <option value="publish" @if($post->status == 'publish') selected @endif>Publish</option>
                                <option value="draft" @if($post->status == 'draft') selected @endif>Draft</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Isi</label>
                    <textarea name="content" id="content" class="form-control shadow-sm" rows="5" placeholder="Masukkan isi post" required>{{ $post->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
