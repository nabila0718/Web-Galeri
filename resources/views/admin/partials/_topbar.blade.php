<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand text-center">
    <!-- Brand Name -->
    <a href="index.html" class="brand-link text-decoration-none">
        <span class="highlighted">Digi</span>Nets
    </a>
</div>

<style>
    .navbar-brand {
        display: inline-block;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        user-select: none;
        position: relative;
        overflow: hidden;
    }

    .brand-link {
        color: #007BFF;
        text-transform: uppercase;
        font-size: 2rem;
        font-weight: bold;
        position: relative;
        display: inline-block;
        transition: all 0.4s ease-in-out;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        animation: textAnimation 3s ease infinite; /* Animasi teks */
    }

    .brand-link .highlighted {
        color: #FFD700;
        font-style: italic;
        position: relative;
        display: inline-block;
        animation: highlightAnimation 3s ease infinite; /* Animasi untuk Digi */
    }

    /* Animasi untuk Teks */
    @keyframes textAnimation {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    /* Animasi untuk Digi */
    @keyframes highlightAnimation {
        0% {
            color: #FFD700;
            transform: rotate(0deg);
        }
        50% {
            color: #FF6347;
            transform: rotate(10deg);
        }
        100% {
            color: #FFD700;
            transform: rotate(0deg);
        }
    }

    /* Efek Hover */
    .brand-link:hover {
        color: #0d6efd;
        text-shadow: 0 10px 20px rgba(0, 123, 255, 0.6), 0 0 25px rgba(0, 123, 255, 0.4);
        transform: scale(1.1);
    }

    /* Efek Animasi saat hover pada Digi */
    .brand-link:hover .highlighted {
        color: #FF6347;
        transform: scale(1.3) rotate(-15deg);
    }
</style>


                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-end ms-auto">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="/logout"><i data-feather="power"
                                        class="svg-icon me-2 ms-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>