<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $connection = 'foodex';
    protected $table = 'brands';
}
