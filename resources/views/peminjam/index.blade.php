@extends('layouts.master')
@section('search-bar')
    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/peminjam">
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
<h1 class="h3 mb-4 text-gray-800">Peminjam</h1>

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
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahPenerbitModal">
            Tambah Peminjam
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NAMA PEMINJAM</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>NO HP</th>
                        <th>ALAMAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                @foreach ($data_peminjam as $peminjam)
                <tr>
                    <td>{{ $peminjam->nama_peminjam }}</td>
                    <td>{{ $peminjam->jenis_kelamin }}</td>
                    <td>{{ $peminjam->agama }}</td>
                    <td>{{ $peminjam->no_hp }}</td>
                    <td>{{ $peminjam->alamat }}</td>
                    <td>
                        <a href="/peminjam/{{ $peminjam->id }}/view" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/peminjam/{{ $peminjam->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/peminjam/{{ $peminjam->id }}/delete" method="POST">
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
<div class="modal fade" id="tambahPenerbitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peminjam Buku</h5>
                <button type="button" class="close b-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/peminjam/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAMA PEMINJAM</label>
                        <input name="nama_peminjam" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="-">

                        @error('nama_peminjam')
                            <span class="text-danger mt-2">Nama peminjam harus diisi</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">JENIS KELAMIN</label>
                        <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                            <option selected disabled>-Pilih-</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        @error('jenis_kelamin')
                            <span class="text-danger mt-2">Jenis Kelamin harus diisi</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">AGAMA</label>
                        <select class="form-control" name="agama" id="exampleFormControlSelect1">
                            <option selected disabled>-Pilih-</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        
                        @error('agama')
                            <span class="text-danger mt-2">Agama harus diisi</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NO HP</label>
                        <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="081829232812xxx">

                        
                        @error('no_hp')
                            <span class="text-danger mt-2">No Hp harus diisi</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ALAMAT</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        
                        @error('alamat')
                            <span class="text-danger mt-2">Alamat harus diisi</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">PINJAM BUKU</label>
                        <select class="form-control select2" multiple name="pinjam_buku[]" id="pinjam_buku">
                            @foreach ($data_buku as $daftarbuku)
                                <option value="{{ $daftarbuku->id }}">{{ $daftarbuku->judul_buku }}</option>
                            @endforeach
                        </select>
                        <br>
                        @error('pinjam_buku')
                            <span class="text-danger mt-2">Pinjam Buku harus diisi</span>
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