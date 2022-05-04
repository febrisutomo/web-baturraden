@extends('layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    {{-- <section id="hero">
    
</section><!-- End Hero --> --}}

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Destinasi Wisata</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Destinasi Wisata</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team ">
            <div class="container">

                <div class="row g-3 mb-3">


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

                <hr>

                <div class="d-flex justify-content-center mt-3">{{ $places->links() }}</div>


            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->

@endsection

@push('style')
    <style>
        .page-link {
            color: #009970;
        }

        .page-item.active .page-link {
            background-color: #009970;
            border-color: #009970;
        }

    </style>
@endpush
