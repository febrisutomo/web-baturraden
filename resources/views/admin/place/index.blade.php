@extends('layouts.admin')

@section('content')

    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div class="div">
                <h1>Daftar Destinasi Wisata</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Destinasi Wisata</li>
                        <li class="breadcrumb-item active">Daftar Destinasi</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('place.create') }}" class="btn btn-primary text-nowrap"> <i class=" bx bx-plus"></i> Tambah</a>
        </div>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body pt-4">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($places as $place)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset($place->photo) }}" class=" rounded-2" width="180px"
                                                alt=""></td>
                                        <td>{{ $place->name }}</td>
                                        <td>{{ $place->created_at }}</td>
                                        <td><a href="{{ route('place.edit', $place->slug) }}"
                                                class="btn btn-sm btn-success mb-1 me-1"><i class="bx bx-edit"></i> Edit</a>
                                            <form action="{{ route('place.destroy', $place->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-nowrap" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="bx bx-trash"></i> Hapus</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
