@extends('admin.layout')

@section('content')
<div class="container py-4">
    <!-- Welcome Message -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary text-center">🎉 Selamat Datang di Dashboard</h1>
    </div>

    <!-- Cards Section -->
    <div class="row mt-5">
        <!-- Manajemen Admin Card -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card shadow-lg border-0 rounded-xl hover-card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Manajemen Admin</h5>
                    <i class="fa fa-users fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <p>Kelola admin dan pengaturan akses.</p>
                </div>
            </div>
        </div>

        <!-- Kategori Card -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card shadow-lg border-0 rounded-xl hover-card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Kategori</h5>
                    <i class="fa fa-tags fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <p>Kelola kategori untuk berbagai jenis konten.</p>
                </div>
            </div>
        </div>

        <!-- Post Card -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card shadow-lg border-0 rounded-xl hover-card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Post</h5>
                    <i class="fa fa-pencil-alt fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <p>Kelola artikel dan postingan di website.</p>
                </div>
            </div>
        </div>

        <!-- Galeri Card -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card shadow-lg border-0 rounded-xl hover-card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Galeri</h5>
                    <i class="fa fa-camera fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <p>Kelola foto dan media galeri website.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        background-color: #e3f2fd;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #1976d2;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        border-radius: 10px 10px 0 0;
    }

    .card-header:hover {
        background: #1565c0;
    }

    .card-header i {
        color: #fff;
        transition: transform 0.3s ease;
    }

    .hover-card:hover i {
        transform: scale(1.3);
    }

    .btn {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 30px;
    }

    .btn:hover {
        background-color: #0d47a1;
    }

    .card-body p {
        font-size: 13px;
        color: #555;
    }
</style>
@endsection
