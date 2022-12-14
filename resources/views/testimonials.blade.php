@extends('layout.admin')

@section('konten')
    <div class="row justify-content-between">
        <div class="col">
            <h4 class="mb-4">Manage {{ $title }}</h4>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahTesti">
                Tambahkan {{ $title }}
            </button>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success fw-bold alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data {{ $title }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sekolah
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Testimoni
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tipe</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">
                                                {{ $data->name }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $data->school_now }}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $data->testimoni }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{ $data->type }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button data-bs-toggle="modal" data-bs-target="#editTesti{{ $data->id }}"
                                            class="edit btn font-weight-bold text-xs" data-original-title="Edit user"
                                            id="edit">
                                            Edit
                                        </button>
                                        <form action="/testimoni/{{ $data->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Hapus" onclick="return confirm('Apakah anda yakin?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editTesti{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="updateLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="updateabel">Update Testimoni</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/testimoni/{{ $data->id }}" method="POST"
                                                    id="editTestiForm" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control"
                                                            name="nama"id="nama" value="{{ $data->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sekolah" class="form-label">Sekolah</label>
                                                        <input type="text" class="form-control" id="sekolah"
                                                            name="sekolah" value="{{ $data->school_now }}"
                                                            placeholder="Sekolah Sekarang">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="testimoniInput" class="form-label">Testimoni</label>
                                                        <textarea class="form-control" id="testimoniInput" name="testimoni" rows="3">{{ $data->testimoni }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('components.modal-testi')
