@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Profil Buku</h1>
        {{-- <h1>Edit Data Buku</h1> --}}
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/buku/{{ $buku->id }}/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Buku</label>
                        <input name="judul_buku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku" value="{{ $buku->judul_buku }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Penulis</label>
                        <select name="id_penulis" class="form-control" id="penulis">
                            @if (is_null($buku->penulis))
                            <option value="">- Pilih -</option>
                        @else
                            <option value="{{ $buku ->penulis->id }}">{{ $buku->penulis->nama_penulis }}</option>
                        @endif
                                @foreach ($data_penulis as $penulis)
                                    <option value="{{ $penulis->id }}">{{ $penulis->nama_penulis }}</option>
                                    
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Penerbit</label>
                        <select name="id_penerbit" class="form-control" id="penerbit">
                            @if (is_null($buku->penerbit))
                                <option value="">- Pilih -</option>
                            @else
                                <option value="{{ $buku ->penerbit->id }}">{{ $buku->penerbit->nama_penerbit }}</option>
                            @endif
                            @foreach ($data_penerbit as $penerbit)
                                <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Buku</label>
                        <select name="jen_buku_id" class="form-control" id="exampleFormControlSelect1">
                            @if (is_null($buku->jenis_buku))
                                <option value="">- Pilih -</option>
                            @else
                                <option value="{{ $buku ->jenis_buku->id }}">{{ $buku->jenis_buku->nama_jenis }}</option>
                            @endif
                            @foreach ($data_jenis as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                                    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN</label>
                        <input name="isbn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XXX-XXX-XX-XXXX-X" value="{{ $buku->isbn }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Edisi</label>
                        <input name="edisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="vol. X"value="{{ $buku->edisi }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun</label>
                        <input name="tahun" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="yyyy"value="{{ $buku->tahun }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah</label>
                        <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku"value="{{ $buku->jumlah }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rak Buku</label>
                        <select class="form-control select2" multiple name="tambah_rakbuku[]" id="tambah_rakbuku">
                            @foreach ($daftar_rakbuku as $listrak)
                            <option selected value="{{ $listrak->id }}">{{ $listrak->no_rakbuku }}</option>
                                
                            @endforeach
                            
                            @foreach ($data_rakbuku as $daftarrakbuku)
                                <option value="{{ $daftarrakbuku->id }}">{{ $daftarrakbuku->no_rakbuku }}</option>
                                    
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