<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    protected $connection = 'foodex';
    protected $table = 'branches';
}
