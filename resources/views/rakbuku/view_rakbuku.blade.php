@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail Rak Buku</h1>
        {{-- <h1>Edit Data Buku</h1> --}}
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>No Rak Buku</th>
                                <td>{{ $rakbuku->no_rakbuku }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Penulis</th>
                                @if (is_null($buku->penulis))
                                    <td>Neh kosong (0)</td>
                                @else
                                    <td>{{ $buku->penulis->nama_penulis }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                @if (is_null($buku->penerbit))
                                    <td>Neh kosong (0)</td>
                                @else
                                    <td>{{ $buku->penerbit->nama_penerbit }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Jenis Buku</th>
                                @if (is_null($buku->jenis_buku))
                                    <td>Neh kosong (0)</td>
                                @else
                                    <td>{{ $buku->jenis_buku->nama_jenis }}</td>
                                @endif
                            </tr> --}}
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $rakbuku->keterangan }}</td>
                            </tr>
                            <tr>
                                <th>Daftar Buku</th>
                                <td>
                                    <ol>
                                        @foreach ($kumpulanbuku as $judulbuku)
                                            <li>
                                                {{ $judulbuku }}
                                            </li>    
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="/rakbuku/{{ $rakbuku->id }}/edit" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit Buku</span>
                    </a>
                </div>
            </div>
          {{-- </div>
                <form action="/buku/{{ $buku->id }}/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Buku</label>
                        <input name="judul_buku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku" value="{{ $buku->judul_buku }}">
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
                        <button type="submit" class="btn btn-warning">Edit</button>
                </form>
                
            </div> --}}
        </div>
@endsection