@extends('layout.admin')

@section('konten')
    <div class="row justify-content-between">
        <div class="col">
            <h4 class="mb-4">Manage {{ $title }}</h4>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahPegawai">
                Tambahkan {{ $title }}
            </button>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success fw-bold alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jabatan</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/pegawai/' . $data->imgPath) }}" width="100px"
                                            alt="" />
                                    </td>
                                    <td>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">
                                                {{ $data->name }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{ $data->position }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button data-bs-toggle="modal" data-bs-target="#editPegawai{{ $data->id }}"
                                            class="edit btn font-weight-bold text-xs" data-original-title="Edit user"
                                            id="edit">
                                            Edit
                                        </button>
                                        <form action="/pegawai/{{ $data->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Hapus" onclick="return confirm('Apakah anda yakin?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editPegawai{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="updateLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="updateabel">Update {{ $title }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pegawai/{{ $data->id }}" method="POST"
                                                    id="editPrestasiForm" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <div class="mb-3 text-center">
                                                        <img src="{{ asset('storage/pegawai/' . $data->imgPath) }}"
                                                            width="300px" alt="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama
                                                            Lengkap</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            id="nama" value="{{ $data->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Jabatan</label>
                                                        <input type="text" class="form-control" name="jabatan"
                                                            id="jabatan" value="{{ $data->position }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload</label>
                                                        <input type="file" class="form-control" name="gambar"
                                                            value="{{ $data->imgPath }}">
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

@include('components.modal-pegawai')
