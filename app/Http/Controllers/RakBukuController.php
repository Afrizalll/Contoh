<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RakBukuController extends Controller
{
    
    public function index(Request $request){
        // dd($request->all());
        if ($request->has('cari')){
            $data_rak = \App\RakBuku::where('no_rakbuku','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_rak = \App\RakBuku::all();
        }
        return view ('rakbuku.index',['data_rak'=> $data_rak]);
    }

    public function editrak($id){
        $rakbuku = \App\RakBuku::find($id);
        return view ('/rakbuku/editrakbuku',['rakbuku'=>$rakbuku]);
    }

    public function viewrak($id){
        $rakbuku = \App\RakBuku::find($id);
        // return view ('/rakbuku/view_rakbuku',['rakbuku'=>$rakbuku]);
        $kumpulanbuku = $rakbuku->buku->pluck('judul_buku')->toArray();
        // $strkumpulanbuku = implode(', ', $kumpulanrak);

        return view('rakbuku/view_rakbuku',['rakbuku' =>$rakbuku ,'kumpulanbuku'=> $kumpulanbuku]);
    }

    public function updatrak(Request $request, $id){
        $rakbuku = \App\RakBuku::find($id);
        $rakbuku ->update($request->all());
        return redirect('/rakbuku')->with('sukses','Data rak buku telah diperbaharui');
    }

    public function tambahrak(Request $request){

        $this->validate($request,[
            'no_rakbuku'=> 'required | unique :rakbuku',
            'keterangan' => 'required',
        ]);

        \App\RakBuku::create($request->all());
        return redirect('/rakbuku')->with('sukses','Data rak buku baru berhasil di tambahkan');
    }

    public function deleterak($id){
        $rakbuku = \App\RakBuku::find($id);
        $rakbuku ->delete();
        return redirect('/rakbuku')->with('sukses','Data rak buku berhasil dihapus');
    }
    

}
