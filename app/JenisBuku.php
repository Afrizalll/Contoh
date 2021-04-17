<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = "jenis_buku";
    protected $fillable =['nama_jenis','keterangan'];

    public function buku(){
        return $this->hasMany(Buku::class,'jen_buku_id','id');
    }
}
