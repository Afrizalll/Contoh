<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerbitContorller extends Controller
{
    public function index(Request $request){
        if ($request->has('cari')){
            $data_penerbit = \App\Penerbit::where('nama_penerbit','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_penerbit = \App\Penerbit::all();
        }
        return view('penerbit.index',['data_penerbit' => $data_penerbit]);
    }

    public function tambahpenerbit(Request $request){

        $this->validate($request,[
            'nama_penerbit' => 'required | unique :penerbit',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        \App\Penerbit::create($request->all());
        return redirect('/penerbit')->with('sukses','Penerbit baru berhasil di tambahkan');
    }

    public function editpenerbit ($id){
        $penerbit = \App\Penerbit::find($id);
        return view('/penerbit/editpenerbit',['penerbit' => $penerbit]);
        // dd($penerbit);
    }

    public function updatepenerbit(Request $request, $id){
        $penerbit = \App\Penerbit::find($id);
        $penerbit ->update($request->all());
        return redirect('/penerbit')->with('sukses','Data Penerbit telah diperbaharui');
    }

    public function deletepenerbit($id){
        $penerbit =\App\Penerbit::find($id);
        $penerbit-> delete();
        return redirect('/penerbit')->with('sukses','Data Penerbit telah dihapus');
    }

    public function viewpenerbit ($id){
        $penerbit = \App\Penerbit::find($id);
        $kumpulanbuku = $penerbit->buku->pluck('judul_buku')->toArray();
        // $strkumpulanbuku = implode(', ', $kumpulanbuku);
        // dd($strkumpulanbuku);

        return view('/penerbit/view_penerbit',['penerbit' => $penerbit, 'kumpulanbuku'=> $kumpulanbuku ]);
        // dd($penerbit);
    }
    
}
