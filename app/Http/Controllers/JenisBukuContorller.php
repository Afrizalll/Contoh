<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisBukuContorller extends Controller
{
    public function index(Request $request){
        if ($request->has('cari')){
            $data_jenis = \App\JenisBuku::where('nama_jenis','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_jenis = \App\JenisBuku::all();
        }
        return view('jenisbuku.index',['data_jenis' => $data_jenis]);
    }

    public function tambahjenis(Request $request){

        $this->validate($request,[
            'nama_jenis' => 'required | unique :jenis_buku',
            'keterangan' => 'required | max: 18',
        ]);



        \App\JenisBuku::create($request->all());
        return redirect('/jenisbuku')->with('sukses','Jenis buku baru berhasil ditambahkan');
    }

    public function editjenis($id){
        $jenisbuku = \App\Jenisbuku::find($id);
        return view('/jenisbuku/editjenisbuku',['jenisbuku' => $jenisbuku]);
        // dd($jenisbuku);
    }

    public function updatejenis(Request $request, $id){
        $jenisbuku = \App\Jenisbuku::find($id);
        $jenisbuku ->update($request->all());
        return redirect('/jenisbuku')->with('sukses','Jenis Buku berhasil diperbaharui');
    }

    public function deletejenis($id){
        $jenisbuku = \App\JenisBuku::find($id);
        $jenisbuku ->delete();
        return redirect('/jenisbuku')->with('sukses','Jenis Buku berhasil dihapus');
    }

    public function viewjenis($id){

        $jenisbuku = \App\Jenisbuku::find($id);
        $kumpulanbuku = '';
        
        $jenisbuku = \App\Jenisbuku::find($id);
        $kumpulanbuku = $jenisbuku->buku->pluck('judul_buku')->toArray();
        // $strkumpulanbuku = implode(', ', $kumpulanbuku);
        // dd($strkumpulanbuku);

        // foreach($jenisbuku->buku as $key => $jenis){
        //     if($key==count($jenisbuku->buku)-1 ){
        //         // $temp = $kumpulanbuku.$jenis->judul_buku;
        //         // $kumpulanbuku = $temp;
        //         $kumpulanbuku.=$jenis->judul_buku;

        //     }else{
        //         $kumpulanbuku.=$jenis->judul_buku.', ';
        //     }

        // }
        // dd($kumpulanbuku);
        return view('/jenisbuku/view_jenis',['jenisbuku' => $jenisbuku, 'kumpulanbuku' => $kumpulanbuku]);
        // dd($jenisbuku);
    }

}
