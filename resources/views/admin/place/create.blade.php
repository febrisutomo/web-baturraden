@extends('layouts.admin')

@section('content')

    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div class="div">
                <h1>Tambah Destinasi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Destinasi Wisata</li>
                        <li class="breadcrumb-item active">Tambah Destinasi</li>
                    </ol>
                </nav>
            </div>
            <button id="btnSubmit" class="btn btn-primary" style="min-width: 100px"> <i class="bx bx-save"></i>
                Simpan</button>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pt-4">
                <form id="formCreate" action="{{ route('place.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                            name="name" placeholder="Masukkan Nama Destinasi Wisata" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <h5 class="card-title">{{ $place->name }}</h5> --}}
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <img id="photo" src="{{ asset('img/default.jpg') }}" class="img-fluid rounded mb-3" alt="">

                            <div class="form-group mb-3">
                                <label class="label" for="inputPhoto">Masukkan Foto</label>
                                <input name="photo" type="file" id="inputPhoto" accept="image/*"
                                    class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <small class="d-block text-muted"> *Ukuran foto maksimal 2MB. Ekstensi yang
                                    diperbolehkan jpg/jpeg/png.</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input id="detail" name="detail" type="text" value="{{ old('detail') }}" hidden>
                            <div id="editor" style="height: 360px">
                            </div>
                            @error('detail')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
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
            placeholder: 'Tulis detail..'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='detail']").value = quill.root.innerHTML;
        });

        const btnSubmit = document.getElementById('btnSubmit');

        btnSubmit.addEventListener('click', () => {
            document.getElementById('formCreate').submit();
        })

        const previewImage = (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const photo = document.getElementById('photo');
                    photo.src = e.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        }
        const inputPhoto = document.getElementById('inputPhoto');
        inputPhoto.addEventListener('change', previewImage);
    </script>

@endpush
