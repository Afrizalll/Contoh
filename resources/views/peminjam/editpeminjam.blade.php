@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Profil Peminjam</h1>
        {{-- <h1>Edit Data Buku</h1> --}}
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/peminjam/{{ $peminjam->id }}/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAMA PEMINJAM</label>
                        <input name="nama_peminjam" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="-" value="{{ $peminjam->nama_peminjam }}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">JENIS KELAMIN</label>
                        <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                            <option>{{ $peminjam->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">AGAMA</label>
                        <select class="form-control" name="agama" id="exampleFormControlSelect1">
                            <option value="{{ $peminjam->agama }}">{{ $peminjam->agama }}</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NO HP</label>
                        <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="081829232812xxx" value="{{ $peminjam->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ALAMAT</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $peminjam->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pinjam Buku</label>
                        <select class="form-control select2" multiple name="bukupinjam[]" id="exampleFormControlSelect1">
                            @foreach ($pinjambuku as $bukupinjaman)
                            <option selected value="{{ $bukupinjaman->id }}">{{ $bukupinjaman->judul_buku }}</option>
                                
                            @endforeach
                            
                            @foreach ($data_buku as $daftarbuku)
                                <option value="{{ $daftarbuku->id }}">{{ $daftarbuku->judul_buku }}</option>
                                    
                            @endforeach
                            {{-- @foreach ($data_buku as $daftarbuku)
                                <option value="">{{ $daftarbuku->judul_buku }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
                
            </div>
        </div>
@endsection