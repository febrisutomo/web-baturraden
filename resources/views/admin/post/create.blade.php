@extends('layouts.admin')

@section('content')

    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div class="div">
                <h1>Tambah Postingan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Postingan</li>
                        <li class="breadcrumb-item active">Tambah Postingan</li>
                    </ol>
                </nav>
            </div>
            <button id="btnSubmit" class="btn btn-primary" style="min-width: 100px"> <i class="bx bx-save"></i>
                Publish</button>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pt-4">
                <form id="formCreate" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                            name="title" placeholder="Masukkan Judul" value="{{ old('title') }}">

                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <img id="thumbnail" src="{{ asset('img/default.jpg') }}" class="rounded mb-3" height="300" alt="">
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="inputThumbnail">Masukkan Thumbnail</label>
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
                        <input id="content" name="content" type="text" value="{{ old('content') }}" hidden>
                        <div id="editor" style="height: 420px"></div>
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
            placeholder: 'Tulis konten..'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='content']").value = quill.root.innerHTML;
        });

        const btnSubmit = document.getElementById('btnSubmit');

        btnSubmit.addEventListener('click', () => {
            document.getElementById('formCreate').submit();
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
