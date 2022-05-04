@extends('layouts.admin')

@section('content')

    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div class="div">
                <h1>Ubah Destinasi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Destinasi Wisata</li>
                        <li class="breadcrumb-item">Daftar Destinasi</li>
                        <li class="breadcrumb-item active">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
            <button id="btnSubmit" class="btn btn-primary text-nowrap"> <i class="bx bx-refresh"></i>
                Update</button>
        </div>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-body pt-4">
                <form id="formEdit" action="{{ route('post.update', $post->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                            name="title" placeholder="Masukkan Judul" value="{{ old('title') ?? $post->title }}">

                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <img id="thumbnail" src="{{ asset($post->thumbnail) }}" class="rounded mb-3" height="300"
                            alt="">
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="inputThumbnail">Ganti Thumbnail</label>
                        <input name="thumbnail" type="file" id="inputThumbnail" accept="image/*"
                            class="form-control @error('thumbnail') is-invalid @enderror">
                        @error('thumbnail')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                        <small class="d-block text-muted"> *Ukuran foto maksimal 2MB. Ekstensi yang
                            diperbolehkan jpg/jpeg/png.</small>
                    </div>

                    <div class="form-group">
                        <input id="content" name="content" type="text" value="{{ old('content') ?? $post->title }}"
                            hidden>
                        <div id="editor" style="min-height: 420px">
                            {!! $post->content !!}</div>
                        @error('content')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

@push('style')
    <style>
        .ql-container {
            font-size: inherit !important
        }

    </style>
@endpush

@push('script')
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Tulis konten...',
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='content']").value = quill.root.innerHTML;
        });

        const btnSubmit = document.getElementById('btnSubmit');

        btnSubmit.addEventListener('click', () => {
            document.getElementById('formEdit').submit();
        })

        const previewImage = (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const thumbnail = document.getElementById('thumbnail');
                    thumbnail.src = e.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        }
        const inputThumbnail = document.getElementById('inputThumbnail');
        inputThumbnail.addEventListener('change', previewImage);
    </script>

@endpush
