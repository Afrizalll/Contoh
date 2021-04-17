<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenulisContorller extends Controller
{
    public function index(Request $request){
        if ($request->has('cari')){
            $data_penulis = \App\Penulis::where('nama_penulis','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_penulis = \App\Penulis::all();
        }
        return view('penulis.index',['data_penulis' => $data_penulis]);
    }

    public function tambahpenulis(Request $request){

        $this->validate($request,[
            'nama_penulis' => 'required | unique:penulis',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        \App\Penulis::create($request->all());
        return redirect('/penulis')->with('sukses','Penulis baru berhasil di tambahkan');
    }

    public function editpenulis($id){
        $penulis = \App\Penulis::find($id);
        return view('/penulis/editpenulis',['penulis' => $penulis]);
        // dd($penulis);
    }

    public function updatepenulis(Request $request, $id){
        $penulis = \App\Penulis::find($id);
        $penulis ->update($request->all());
        return redirect('/penulis')->with('sukses','Data penulis telah diperbaharui');
    }

    public function deletepenulis($id){
        $penulis = \App\Penulis::find($id);
        $penulis-> delete($penulis);
        return redirect('/penulis')->with('sukses','Data penulis telah dihapus');
    }

    public function viewpenulis($id){
        $penulis = \App\Penulis::find($id);
        $kumpulanbuku = $penulis->buku->pluck('judul_buku')->toArray();


        return view('/penulis/view_penulis',['penulis' => $penulis, 'kumpulanbuku'=> $kumpulanbuku]);
        // dd($penulis);
    }

}