<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    protected $table = 'kerjasama';

    protected $fillable = ['nama', 'nowa', 'kategori', 'pesan'];
}
