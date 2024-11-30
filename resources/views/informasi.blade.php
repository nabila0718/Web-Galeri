<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 Bogor - Informasi Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }
        #informasi .section-title {
            position: relative;
            color: #0056b3;
        }
        #informasi .section-title::after {
            content: "";
            display: block;
            width: 100px;
            height: 4px;
            background-color: #0056b3;
            margin: 10px auto 0;
        }
        .content-text {
            text-align: justify;
            line-height: 1.8;
            color: #555;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .footer {
            background-color: #002147;
            color: white;
            padding: 1.5rem 0;
            text-align: center;
        }
        .footer a {
            color: #00bcd4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SMKN 4 BOGOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
        </div>
    </nav>

    <!-- Informasi -->
    <section id="informasi" class="py-5">
        <div class="container">
            <div class="section-title">Informasi Sekolah</div>
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="assets/images/kepsek.jpeg" alt="Foto SMKN 4 Bogor" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-8">
                    <h2>Tentang Kami</h2>
                    <p class="content-text">
                        <strong>SMKN 4 BOGOR</strong> merupakan sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi. Sekolah ini didirikan dan dirintis pada tahun 2008 kemudian dibuka pada tahun 2009 yang saat ini terakreditasi A. Terletak di Jalan Raya Tajur Kp. Buntar, Muarasari, Bogor, sekolah ini berdiri di atas lahan seluas 12.724 m<sup>2</sup> dengan berbagai fasilitas pendukung di dalamnya. Terdapat 54 staff pengajar dan 22 orang staff tata usaha, dikepalai oleh Drs. Mulya Mulprihartono, M. Si, sekolah ini merupakan investasi pendidikan yang tepat untuk putra/putri anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Foto Jurusan -->
    <section id="foto-jurusan" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">Kompetensi Keahlian</div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="assets/images/PPLG.png" class="card-img-top fixed-image" alt="PPLG">
                        <div class="card-body">
                            <h5 class="card-title">PPLG</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="assets/images/TJKT.png" class="card-img-top fixed-image" alt="TJKT">
                        <div class="card-body">
                            <h5 class="card-title">TJKT</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="assets/images/TKR.png" class="card-img-top fixed-image" alt="TKR">
                        <div class="card-body">
                            <h5 class="card-title">TKR</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="assets/images/TFLM.jpg" class="card-img-top fixed-image" alt="TFLM">
                        <div class="card-body">
                            <h5 class="card-title">TFLM</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi -->
    <section id="lokasi" class="py-5">
        <div class="container">
            <div class="section-title">Lokasi Sekolah</div>
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Temukan Kami</h3>
                </div>
                <div class="card-body p-0">
                    <div class="embed-responsive" style="height: 450px; border-radius: 0;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15852.187990492366!2d106.8250633!3d-6.6410863!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1683016576212!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="card-footer bg-light text-center">
                    <p class="text-muted mb-0">Klik pada peta untuk mendapatkan petunjuk arah menuju lokasi sekolah kami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 SMKN 4 Bogor - Semua Hak Dilindungi | <a href="#">Kebijakan Privasi</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
