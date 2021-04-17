<?php

namespace App\Http\Controllers;

use App\Peminjam;
use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PeminjamController extends Controller
{
    public function index(Request $request){
        $data_buku = Buku::all();
        if ($request->has('cari')) {
            $data_peminjam = \App\Peminjam::where('nama_peminjam','LIKE','%'.$request->cari.'%')->get();
        } else {
            $data_peminjam = \App\Peminjam::all();    
        }
        
        return view('peminjam.index',['data_peminjam' => $data_peminjam], compact('data_buku'));
    }

    public function editpeminjam($id){
        $data_buku = Buku::all();
        
        $peminjam = \App\Peminjam::find($id);
        $pinjambuku = $peminjam->buku;
        return view('peminjam.editpeminjam',['peminjam' => $peminjam, 'pinjambuku' => $pinjambuku], compact('data_buku'));
    }

    public function viewpeminjam($id){
        $peminjam = \App\Peminjam::find($id);
        $kumpulanbuku = $peminjam->buku->pluck('judul_buku')->toArray();
        return view('peminjam.view_peminjam',['peminjam' => $peminjam, 'kumpulanbuku' => $kumpulanbuku]);
    }

    public function updatepeminjam(Request $request, $id){
        
        $peminjam = \App\Peminjam::find($id);
        // $peminjam['id_buku']= request('buku');
        $bukubaru = request('bukupinjam');
        $bukulama = $peminjam->buku->pluck('id')->toArray();
        $peminjam ->update($request->all());

        // $minjembuku = 

        $peminjam -> buku() ->sync($bukubaru);

        // $peminjam -> buku() ->attach(array_diff($bukubaru, $bukulama));

        // $peminjam -> buku() ->detach(array_diff($bukulama, $bukubaru));

        // foreach ($bukubaru as $buku){
        //     if (!in_array($buku,$bukulama)){
        //         $peminjam -> buku()->attach($bukubaru);

        //     }
        // }


        // dd($bukubaru);
        // $peminjam -> buku()->sync(request('pinjam_buku'));
        return redirect('/peminjam')->with('sukses','Data peminjam berhasil diperbaharui');
    }

    public function tambahpeminjam (Request $request){



        $this->validate($request,[
            'nama_peminjam' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pinjam_buku' => 'required',
            
        ]);

        // dd($request->pinjam_buku);

        foreach ($request->pinjam_buku as $databuku ){
            
            $data_buku=  Buku::where('id', $databuku)->get()->first();
            
            $data_pinjam = 1;
            $total = $data_buku->jumlah - $data_pinjam;

            $buku = Buku::where('id', $data_buku->id)->update([
                'jumlah' =>$total
            ]);

            // $total ->update($total->all());
            // if($buku){
            //     return ('berhasil');

            // }else{
            //     return('gagal');
            // }

        }

        // $data_buku=  Buku::where('id', $request->id)->get()->first();

        $tambahpinjam = \App\Peminjam::all();
        $tambahpinjam = \App\Peminjam::create($request->all());
        $tambahpinjam -> buku()->attach(request('pinjam_buku'));
        
        // $data_buku=  Buku::where('id', $request->id)->get()->first();
        

        // $tambahpinjam = Peminjam::find($request);
        // dd($tambahpinjam);

        // $pinjaman_buku = Buku::with('buku_pinjam')->find($request->id);
        // $data_buku = Buku::all();
        // $data_buku=  Buku::find(1)->get()->first();
        // $data_pinjam = 3;
        // $total = $data_buku->jumlah - $data_pinjam;



        // dd($pinjaman_buku);
        
        
        // $kurangbuku = $tambahpinjam->buku->pluck('id')->toArray();
        // foreach ($data_buku)



        return redirect('/peminjam')->with('sukses','Peminjam baru berhasil ditambahkan');
    }




    public function deletepeminjam($id){
        $peminjam = \App\Peminjam::find($id);
        $peminjam ->delete();
        return redirect('/peminjam')->with('sukses','Data rak buku berhasil dihapus');
    }

}
