<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = ['activity', 'created_at'];
}
