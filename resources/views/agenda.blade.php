<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Sekolah - SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            color: #0056b3;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 1.5rem;
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
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
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

    <!-- Agenda Section -->
    <div class="container my-5">
    <h2 class="section-title">{{ $title }}</h2>
    
    <!-- Menampilkan Post -->
    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Menampilkan Gambar dari Galeri -->
    <h3 class="section-title mt-5"></h3>
    <div class="row g-4">
        @foreach ($images as $image)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/' . $image->file) }}" class="card-img-top" alt="{{ $image->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->title }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 SMKN 4 Bogor - Semua Hak Dilindungi | <a href="#">Kebijakan Privasi</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
