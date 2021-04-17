@extends('layouts.master')

@section('search-bar')
    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/buku">
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
    <h1 class="h3 mb-4 text-gray-800">Daftar Buku</h1>

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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahBukuModal">
                    Tambah Buku
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>JUDUL BUKU</th>
                                <th>PENULIS</th>
                                <th>JENIS BUKU</th>
                                <th>EDISI</th>
                                <th>TAHUN</th>
                                <th>JUMLAH</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        @foreach ($data_buku as $buku)
                        <tr>
                            <td>{{ $buku->judul_buku }}</td>
                            @if (is_null($buku->penulis))
                                <td>Neh kosong (0)</td>
                            @else
                                <td>{{ $buku->penulis->nama_penulis }}</td>
                            @endif
                            {{-- <td>{{ $buku->isbn }}</td> --}}
                            @if (is_null($buku->jenis_buku))
                                <td>Neh kosong (0)</td>
                            @else
                                <td>{{ $buku->jenis_buku->nama_jenis }}</td>
                            @endif
                            <td>{{ $buku->edisi }}</td>
                            <td>{{ $buku->tahun }}</td>
                            <td>{{ $buku->jumlah }}</td>
                            <td>
                                {{-- <a href="diskon_produk" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-percent"></i>
                                </a> --}}
                                <a href="/buku/{{ $buku->id }}/view" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="/buku/{{ $buku->id }}/edit" class="btn btn-circle btn-warning btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="">
                                    <form action="/buku/{{ $buku->id }}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Yakin mau dihapus?') ">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </a>
                                {{-- <a href="/buku/{{ $buku->id }}/delete" class="btn btn-danger" onclick="return confirm ('Yakin mau dihapus?')">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- Modal -->
    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="close b-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/buku/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Buku</label>
                            <input name="judul_buku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku">
                            @error('judul_buku')
                                <span class="text-danger mt-2">
                                    Judul buku harus diisi dan lebih dari 5 karakter
                                </span> 
                            @enderror

                            {{-- @if ($errors->has('judul_buku'))
                                <span class="help-block" style="color: red">{{ $errors->first('judul_buku') }}</span>
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Penulis</label>
                            <select name="id_penulis" class="form-control" id="penulis">
                                <option value="">- Pilih -</option>
                                    @foreach ($data_penulis as $penulis)
                                        <option value="{{ $penulis->id }}">{{ $penulis->nama_penulis }}</option>
                                        
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Penerbit</label>
                            <select name="id_penerbit" class="form-control" id="penerbit">
                                <option value="">- Pilih -</option>
                                    @foreach ($data_penerbit as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                                        
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('jen_buku_id' ? 'has-erorr': '') }}">
                            <label for="exampleFormControlSelect1">Jenis Buku</label>
                            <select name="jen_buku_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="">- Pilih -</option>
                                    @foreach ($data_jenis as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                                        
                                    @endforeach
                            </select>
                            @error('jen_buku_id')
                                <span class="text-danger mt-2">
                                    Jenis buku harus diisi
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('isbn' ? 'has-erorr': '') }}">
                            <label for="exampleInputEmail1">ISBN</label>
                            <input name="isbn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XXX-XXX-XX-XXXX-X">
                            @error('isbn')
                                <span class="text-danger mt-2">
                                    ISBN buku harus diisi dan unique
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('edisi' ? 'has-erorr': '') }}">
                            <label for="exampleInputEmail1">Edisi</label>
                            <input name="edisi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="vol. X"> 
                            @error('edisi')
                                <span class="text-danger mt-2">
                                    Edisi buku harus diisi
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('tahun' ? 'has-erorr': '') }}">
                            <label for="exampleInputEmail1">Tahun</label>
                            <input name="tahun" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="yyyy">
                            @error('tahun')
                                <span class="text-danger mt-2">
                                    Tahun buku harus diisi
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('jumlah' ? 'has-erorr': '') }}">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah Buku">
                            @error('jumlah')
                                <span class="text-danger mt-2">
                                    Jumlah buku harus diisi
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rak Buku</label>
                            <select name="tambah_rakbuku[]" class="form-control select2" multiple id="tambah_rakbuku">
                                <option value="">- Pilih -</option>
                                    @foreach ($data_rakbuku as $rakbuku)
                                        <option value="{{ $rakbuku->id }}">{{ $rakbuku->no_rakbuku }}</option>
                                        
                                    @endforeach
                            </select>
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

{{-- @push('page-scripts')
<script src="{{ asset('assets/modules/prism/prism.js') }}"></script>
@endpush

@push('specific-scripts')
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    
@endpush

@push('after-scripts')

@endpush --}}