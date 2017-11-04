<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\products;
use App\sales;
use App\purchases;
class common extends Model
{
    public static function stock($id){
       $product = products::find($id);
       $purchases = purchases::groupBy('product_id')->where('product_id',$product->id)->selectRaw('sum(product_qty) as sum')->get();$sum=0;
       foreach ($purchases as $purchase) { $sum += $purchase->sum;}
        $sales = sales::groupBy('product_id')->where('product_id',$product->id)->selectRaw('sum(product_qty) as sum')->get();
       foreach ($sales as $sale) { $sum -= $sale->sum;}
       if($sum<0){$sum=0;}
       return $sum;
    }
}
