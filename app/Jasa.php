<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table = 'jasa';

    protected $fillable = ['users_id','jasa', 'harga', 'detail'];
}
