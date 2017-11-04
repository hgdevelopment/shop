<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\products;
class purchases extends Model
{
    protected $connection = 'foodex';
    protected $table = 'purchase_products';
}
