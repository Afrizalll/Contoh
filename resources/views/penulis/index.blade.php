@extends('layouts.master')
@section('search-bar')
    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/penulis">
        <div class="input-group">
            <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection


@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Penulis</h1>

@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
<div class="row">
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahPenulisModal">
            Tambah Penulis
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NAMA PENULIS</th>
                        <th>NO HP</th>
                        <th>ALAMAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                @foreach ($data_penulis as $penulis)
                <tr>
                    <td>{{ $penulis->nama_penulis }}</td>
                    <td>{{ $penulis->no_hp }}</td>
                    <td>{{ $penulis->alamat }}</td>
                    <td>
                        <a href="/penulis/{{ $penulis->id }}/view" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/penulis/{{ $penulis->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/penulis/{{ $penulis->id }}/delete" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Yakin mau dihapus?') ">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        {{-- <a href="/buku/{{ $buku->id }}/delete" class="btn btn-danger" onclick="return confirm ('Yakin mau dihapus?')">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahPenulisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penulis Buku</h5>
                <button type="button" class="close b-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/penulis/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Penulis Buku</label>
                        <input name="nama_penulis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Jenis Buku">
                        @error('nama_penulis')
                            <span class="text-danger mt-2">Nama penulis harus diisi dan unique</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No HP">
                        @error('no_hp')
                            <span class="text-danger mt-2">No HP penulis harus diisi</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
                        @error('alamat')
                            <span class="text-danger mt-2">Alamat penulis harus diisi</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

