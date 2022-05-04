@extends('layouts.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row" data-masonry='{"percentPosition": true }'>

                    @foreach ($posts as $post)

                        <div class="col-lg-4 entries">

                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset($post->thumbnail) }}" alt="" class="img-fluid"
                                        style="width: 100%; height: 240px; object-fit:cover;">
                                </div>

                                <h6 class="entry-title">
                                    <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                                </h6>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">Admin</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#">{{ $post->date }}</a></li>
                                        {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    {!! Str::limit($post->content, 100) !!}
                                    <div class="read-more">
                                        <a href="{{ route('blog.single', $post->slug) }}">Read More</a>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->
                        </div>
                    @endforeach



                    <div class="d-flex justify-content-center mt-3">
                        {{ $posts->links() }}
                    </div>


                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>
@endpush

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
