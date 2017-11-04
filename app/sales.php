<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\products;
class sales extends Model
{
    protected $connection = 'foodex';
    protected $table = 'sales_products';
}
