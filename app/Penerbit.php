<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = "penerbit";
    protected $fillable =['nama_penerbit','no_hp','alamat'];

    public function buku(){
        return $this->hasMany(Buku::class,'id_penerbit','id');
    }

}
