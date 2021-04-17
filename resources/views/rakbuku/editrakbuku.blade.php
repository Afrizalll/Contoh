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
                <form action="/rakbuku/{{ $rakbuku->id }}/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Rak Buku</label>
                        <input name="no_rakbuku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku" value="{{ $rakbuku->no_rakbuku }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XXX-XXX-XX-XXXX-X" value="{{ $rakbuku->keterangan }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
                
            </div>
        </div>
@endsection