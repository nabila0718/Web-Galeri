<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styling */
        .hero-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-section img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-text {
            text-align: center;
            color: white;
            z-index: 1;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            margin-bottom: 30px;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-text p {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        /* Cards Styling */
        .cards-wrapper {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            z-index: 1;
            padding: 20px;
            margin-top: 30px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 20px;
            flex: 1 1 250px;
            max-width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        .card-footer {
            background-color: transparent;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .cards-wrapper {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">SMKN 4 BOGOR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>


    <!-- Hero Section -->
    <div class="hero-section">
        <img src="{{ asset('assets/images/smkn4bogor.jpg') }}" alt="SMKN 4 Bogor Image">

        <!-- Hero Text -->
        <div class="hero-text">
            <h1>Selamat Datang di SMKN 4 Bogor</h1>
            <p>Menciptakan Generasi Muda yang Unggul dan Kompeten.</p>
        </div>

        <!-- Cards Section -->
        <div class="cards-wrapper">
            <!-- Informasi Card -->
            <div class="card">
                <div class="card-title">Informasi Sekolah</div>
                <div class="card-text">Beberapa informasi tentang SMKN 4 Bogor yang perlu diketahui oleh masyarakat.</div>
                <div class="card-footer">
                    <a href="{{ route('informasi') }}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Galeri Card -->
            <div class="card">
                <div class="card-title">Galeri Foto</div>
                <div class="card-text">Lihat koleksi album/foto kegiatan dan event yang ada di SMKN 4 Bogor.</div>
                <div class="card-footer">
                    <a href="{{ route('galeri') }}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Agenda Card -->
            <div class="card">
                <div class="card-title">Agenda Kegiatan</div>
                <div class="card-text">Jadwal kegiatan dan acara yang akan berlangsung di SMKN 4 Bogor dalam waktu dekat.</div>
                <div class="card-footer">
                    <a href="{{ route('agenda') }}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
