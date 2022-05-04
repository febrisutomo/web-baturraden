<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Wisata Baturraden</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('home') }}">Baturraden</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
                    {{-- <li><a href="about.html">Tentang Kami</a></li> --}}
                    <li><a href="{{ route('destinations')}}">Destinasi Wisata</a></li>

                    <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    <li><a href="{{ route('blog') }}" class="getstarted">Blog</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Wisata Baturraden</h3>
                            <p>Website ini dikelola oleh Dinas Pemuda, Olahraga, Kebudayaan Dan Pariwisata Kabupaten
                                Banyumas</p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2"></div>


                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Link</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Destinasi Wisata</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Berita dan Artikel</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Kontak</h4>
                        <p>
                            Baturaden, Kabupaten Banyumas, Jawa Tengah 53151<br><br>
                            <strong>Phone:</strong> 0813-2811-1191<br>
                            <strong>Email:</strong> info@baturraden.com<br>
                        </p>


                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Wisata Baturraden</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @stack('style')

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
