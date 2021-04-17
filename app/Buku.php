<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    protected $table = "buku";
    protected $fillable =['jen_buku_id','id_penulis','id_penerbit','judul_buku','isbn','edisi','tahun','jumlah'];

    public function jenis_buku(){
        return $this->belongsTo(JenisBuku::class,'jen_buku_id','id');
    }

    public function penulis(){
        return $this->belongsTo(Penulis::class,'id_penulis','id');
    }

    public function penerbit(){
        return $this->belongsTo(Penerbit::class,'id_penerbit','id');
    }

    public function rakbuku(){
        return $this->belongsToMany(RakBuku::class,'buku_rakbuku','id_buku','id_rak');
    }

    public function peminjam(){
        return $this->belongsToMany(Peminjam::class,'buku_peminjam','id_buku','id_peminjam');
    }

}
