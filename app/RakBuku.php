<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RakBuku extends Model
{
    protected $table =  "rakbuku";
    protected $fillable =['no_rakbuku','keterangan'];

    public function buku(){
        return $this->belongsToMany(Buku::class, 'buku_rakbuku','id_rak','id_buku');
    }

}
