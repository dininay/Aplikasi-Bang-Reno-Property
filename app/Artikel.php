<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = ['users_id','judul', 'kategori', 'isi','gambar'];
}
