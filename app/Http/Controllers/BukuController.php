<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBuku;
use App\Penerbit;
use App\Penulis;
use App\RakBuku;

class BukuController extends Controller
{
    public function index(Request $request){
        // dd($request->all());
        $data_rakbuku = RakBuku::all();
        $data_penerbit = Penerbit::all();
        $data_penulis = Penulis::all();
        $data_jenis = JenisBuku::all();
        if ($request->has('cari')){
            $data_buku = \App\Buku::where('judul_buku','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_buku = \App\Buku::all();
        }
        // dd($data_buku->first()->jenis_buku->nama_jenis);
        return view('buku.index',['data_buku' => $data_buku], compact('data_jenis','data_penulis','data_penerbit', 'data_rakbuku'));
        

    }

    public function tambahbuku(Request $request){
        // dd($request);

        $this->validate($request,[
            'judul_buku' => 'required|min:5',
            'jen_buku_id' => 'required',
            'isbn' => 'required | unique :buku',
            'edisi' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',

        ]);

        $buku = \App\Buku::create($request->all());

        $buku -> rakbuku()->attach(request('tambah_rakbuku'));
        return redirect('/buku')->with('sukses','Buku baru berhasil ditambahkan');
    }

    public function editbuku($id){
        $buku = \App\Buku::find($id);
        $data_penerbit = Penerbit::all();
        $data_penulis = Penulis::all();
        $data_jenis = JenisBuku::all();

        // $id_penerbit = $buku->penerbit->pluck('id');
        // $id_penulis = $buku->penulis->pluck('id');
        // $id_jenis = $buku->jenisbuku->pluck('id');
        
        $data_rakbuku = RakBuku::all();

        $daftar_rakbuku = $buku->rakbuku;

        return view('buku/editbuku',['buku' =>$buku, 'daftar_rakbuku'=>$daftar_rakbuku], compact('data_jenis','data_penulis','data_penerbit','data_rakbuku'));
        // dd($buku);

        // , 'id_penerbit'=>$id_penerbit, 'id_jenis'=>$id_jenis, 'id_penulis'=>$id_penulis
    }

    public function updatebuku(Request $request, $id){
        $buku = \App\Buku::find($id);
        $tempatrak_baru = request('tambah_rakbuku');

        $buku ->update ($request->all());
        $buku -> rakbuku() ->sync($tempatrak_baru);
        // dd($buku);
        return redirect('/buku')->with('sukses','Data buku baru berhasil diperbaharui');

    }

    public function deletebuku ($id){
        $buku = \App\Buku::find($id);
        $buku->delete();
        return redirect ('/buku')->with('sukses','Data buku berhasil dihapus');
    }

    public function deletedata($id){
        $buku = \App\Buku::find($id);
        $buku->delete();
        return redirect ('/buku')->with('sukses','Data buku berhasil dihapus');
    }

    public function viewbuku($id){
        $buku = \App\Buku::find($id);
        // return view('buku/view_buku',['buku' =>$buku]);
        // dd($buku);

        // $rakbuku = \App\RakBuku::find($id);
        $kumpulanrak = $buku->rakbuku->pluck('no_rakbuku')->toArray();
        $strkumpulanrak = implode(', ', $kumpulanrak);

        return view('buku/view_buku',['buku' =>$buku ,'strkumpulanrak'=> $strkumpulanrak]);
    }

}
