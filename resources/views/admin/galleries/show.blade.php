@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Detail Galeri Foto</h1>
    </div>
<div class="row">
    <!-- Detail Informasi Gallery -->
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Judul Post</td>
                        <td>:</td>
                        <td>{{ $gallery->post->title }}</td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{ $gallery->position ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <span class="badge {{ $gallery->status == 'aktif' ? 'bg-success' : 'bg-warning' }}">
                                {{ Str::ucfirst($gallery->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Dibuat Pada</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Foto Gallery -->
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="m-0 p-0"><i data-feather="image"></i> Foto</h4>
                <!-- Button Tambah Foto -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImageModal">
                    + Foto
                </button>
            </div>

            <!-- Modal Tambah Foto -->
            <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="/images/store" method="POST" enctype="multipart/form-data" class="modal-content">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title text-secondary" id="addImageModalLabel">Tambah Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-secondary">
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                            <div class="mb-3">
                                <label for="file" class="form-label">Foto</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

             <!-- Modal Edit Foto -->
            @foreach ($gallery->images as $image)
            <div class="modal fade" id="editImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="editImageModalLabel{{ $image->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                        @csrf
                        @method('PUT') <!-- Menandakan ini adalah permintaan PUT -->
                        <div class="modal-header">
                            <h5 class="modal-title text-secondary" id="editImageModalLabel{{ $image->id }}">Edit Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-secondary">
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                            <div class="mb-3">
                                <label for="file" class="form-label">Edit Foto</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $image->title }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach

            <div class="card-body bg-light">
                <!-- Error Validasi -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0 p-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Pesan Berhasil -->
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

               <!-- List Foto -->
                <div class="row">
                    @forelse ($gallery->images as $image)
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <img src="{{ asset('images/' . $image->file) }}" alt="{{ $image->title }}" class="img-fluid">
                            <div class="p-2 d-flex justify-content-between">
                                <h5>{{ $image->title }}</h5>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">
                                        <i data-feather="edit-2" class="text-white"></i>
                                    </button>
                                    <form action="/images/{{ $image->id }}" method="post" class="d-inline ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                            <i data-feather="trash-2" class="text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning">Tidak Ada Foto.</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
