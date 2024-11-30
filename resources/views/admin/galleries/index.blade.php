@extends('admin.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Galeri Foto</h1>
        <a href="{{ route('galleries.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Galeri
        </a>
    </div>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Galeri</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($galleries && $galleries->isNotEmpty())
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gallery->post->title }}</td>
                                <td>{{ $gallery->position }}</td>
                                <td>
                                    @if ($gallery->status == 'aktif')
                                        <span class="badge bg-success">{{ Str::ucfirst($gallery->status) }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ Str::ucfirst($gallery->status) }}</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <!-- Detail Button -->
                                    <a href="/galleries/{{ $gallery->id }}" class="btn btn-success me-2">
                                        <i data-feather="info"></i> Detail
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="/galleries/{{ $gallery->id }}/edit" class="btn btn-warning me-2">
                                        <i data-feather="edit"></i> Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="/galleries/{{ $gallery->id }}" method="post" onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i data-feather="trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data galeri.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
