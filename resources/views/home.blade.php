@extends('layouts.app')


@section('content')
    
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 2 -->
            <div class="carousel-item active"
                style="background-image: url({{ asset('img/slide/lokawisata-baturraden.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h4 class="animate__animated animate__fadeInDown">Wisata Baturraden</h4>
                        <h2 class="animate__animated animate__fadeInUp">Lokawisata Baturraden</h2>
                        <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item"
                style="background-image: url({{ asset('img/slide/curug_jenggala.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h4 class="animate__animated animate__fadeInDown">Wisata Baturraden</h4>
                        <h2 class="animate__animated animate__fadeInUp">Curug Jenggala</h2>
                        <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                    </div>
                </div>
            </div>

            <!-- Slide 1 -->
            <div class="carousel-item" style="background-image: url({{ asset('img/slide/curug-bayan.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h4 class="animate__animated animate__fadeInDown">Wisata Baturraden</h4>
                        <h2 class="animate__animated animate__fadeInUp">Curug Bayan</h2>
                        <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                    </div>
                </div>
            </div>

            <!-- Slide 1 -->
            <div class="carousel-item" style="background-image: url({{ asset('img/slide/small-world.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h4 class="animate__animated animate__fadeInDown">Wisata Baturraden</h4>
                        <h2 class="animate__animated animate__fadeInUp">Small World</h2>
                        <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                    </div>
                </div>
            </div>



        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content align-items-center">
                <div class="col-lg-6">
                    <h2>Selamat Datang</h2>
                    <p>
                        Website Resmi Wisata Baturraden hadir untuk memberikan informasi tentang wisata yang ada di
                        wilayah
                        Kecamatan Baturraden. Hadirnya website ini diharapkan dapat mengenalkan wisata-wisata secara
                        efektif
                        dan efesien kepada Masyarakat. </p>
                    <p>
                        Mengusung semangat Everyday Is Holiday wisata Baturraden hadir dengan berbagai pilihan
                        destinasi
                        wisata yang menawarkan keindahan alam dan memberikan sensasi berbeda dari tempat wisata
                        lainnya
                    </p>
                    <a href="#about"
                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>

                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <div class="row g-3">
                        <div class="col-6 align-self-end">
                            <img src="{{ asset('img/about/img2.png') }}" class=" img-fluid" alt="">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('img/about/jenggala_img_7.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('img/about/pinus_img_4.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('img/about/img5.png') }}" class=" img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <section id="video" class="video">
        <div class="container text-center">
            <div class="section-title pb-2 text-center">
                <h2 class="text-light">Kenali Kami</h2>
                <p class="text-light">Wisata Baturraden</p>

            </div>
            <div class="mb-3 m-auto text-light" style="max-width: 800px;">
                <p>Wisata Baturraden menyiapkan lokasi wisata di alam terbuka yang aman, sehat, dan nyaman dengan
                    berbagai
                    daya tarik wisata dan spot menarik</p>
            </div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PXM_GGYNJ58"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>


        </div>
    </section><!-- End About Section -->

    <section id="destination" class="destination">
        <div class="container">
            <div class="section-title d-flex justify-content-between align-items-center">
                <p>Destinasi Pilihan</p>
                <a href="{{ route('destinations') }}">Lihat Semua</a>
            </div>
            <div class="row g-3">


                @foreach ($places as $place)

                    <div class="col-lg-4 text-center">
                        <a href="#detail-{{ $place->id }}" data-bs-toggle="modal">
                            <img class="img-fluid mb-2 rounded" src="{{ asset($place->photo) }}"
                                style="height: 200px; width: 300px; object-fit:cover" alt="">
                        </a>
                        <a href="#">
                            <h4 class="fw-bold">{{ $place->name }}</h4>
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="detail-{{ $place->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fw-bold" id="exampleModalLabel">{{ $place->name }}</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-fluid mb-2 rounded" src="{{ asset($place->photo) }}"
                                                style="height: 200px; object-fit:cover" alt="">

                                        </div>
                                        <div class="col-8">
                                            {!! $place->detail !!}
                                        </div>
                                    </div>


                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Lihat Peta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </section>
</main><!-- End #main -->

@endsection
