<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bangalore;
use App\products;

class importController extends Controller
{
   public function bangalore(){
   	 $products = bangalore::all();

   	foreach ($products as $product) {
   	  $pro = products::where('code',$product->stock_id)->first();
   	  if($pro == NULL){
   	  	$new = new products;
   	  	$new->name='';
   	  	$new->code='';
   	  	$new->short='';
   	  	$new->large='';
   	  	$new->price='';
   	  	$new->cover='';
   	  	$new->gallery='';
   	  	$new->branch='';
   	  	return 'stopped';
   	  }else{

   	  }
   	}


   }
}
