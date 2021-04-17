<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = "penulis";
    protected $fillable =['nama_penulis','no_hp','alamat'];

    public function buku(){
        return $this->hasMany(Buku::class,'id_penulis','id');
    }

}
