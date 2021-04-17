@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Jenis Buku</h1>
        {{-- <h1>Edit Data Buku</h1> --}}
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/penulis/{{ $penulis->id }}/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jenis Buku</label>
                        <input name="nama_penulis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku" value="{{ $penulis->nama_penulis }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Hp</label>
                        <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XXX-XXX-XX-XXXX-X" value="{{ $penulis->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XXX-XXX-XX-XXXX-X" value="{{ $penulis->alamat }}">
                    </div>
                        <button type="submit" class="btn btn-warning">Edit</button>
                </form>
                
            </div>
        </div>
@endsection