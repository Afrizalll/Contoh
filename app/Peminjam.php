<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = "peminjam";
    protected $fillable = ['nama_peminjam','jenis_kelamin','agama','no_hp','alamat'];
    
    public function buku(){
        return $this->belongsToMany(Buku::class,'buku_peminjam','id_peminjam','id_buku');
    }

}
