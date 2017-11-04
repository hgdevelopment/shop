<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\products;
class products extends Model
{
    protected $connection = 'foodex';
    protected $table = 'products';

    public function branch()
    {
        return $this->hasOne('App\branches', 'id', 'added_branch');
    }
}
