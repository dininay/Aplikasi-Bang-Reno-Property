<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keunggulan extends Model
{
    protected $table = 'keunggulan';

    protected $fillable = ['users_id','keunggulan', 'detail'];
}
