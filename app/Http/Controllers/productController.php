<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\unit;
use App\brands;
use App\branches;
use App\common;

class productController extends Controller
{
   public function home(){
    return view('product');
   }

   public function add(){
    $products = products::paginate(13);
    $units = unit::all();
    $brands = brands::all();
    return view('add',compact('products','units','brands'));
   }

   public function store(Request $request){
   $product = products::find($request->id);
   $product->description  =$request->shortdescription;
   $product->largedescription =$request->largedescription;
   $product->save();
   return redirect('product/add/'.$request->id);
   }

   public function view(){
   	return $products = bangalore::select('stock_name')->get();
   }

   public function edit(Request $request){
     $product = products::find($request->id);
     $unit = unit::find($product->unit_id);
     $brand = brands::find($product->product_brand);
     return view('add',compact('product','units','brands'));
   }

   public function img(Request $request){
      switch ($request->type) {
         case 'primary':
               $image = $request->file('primary');
               $code = products::find($request->code)->product_number;
               $code = $code.'-'.$request->code;
               $input['imagename'] = $code.'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/products');
               $image->move($destinationPath, $input['imagename']);
               $update = products::find($request->code);
               $update->primary = $input['imagename'];
               $update->save();
               return redirect('product/add/'.$request->code);
            break;
        case 'other':
                  $image = $request->file('primary');
                  $code = products::find($request->code);
                  $other = $code->other;
                  $code = $request->typeid.'-'.$code->product_number.'-'.$request->code;
                  $input['imagename'] = $code.'.'.$image->getClientOriginalExtension();
                  $destinationPath = public_path('/products');
                  $image->move($destinationPath, $input['imagename']);

                  if($other==''){
                    $one[$request->typeid] = $input['imagename'];
                    $json = json_encode($one);
                    $update = products::find($request->code);
                    $update->other = $json;
                    $update->save();
                  }else {
                    $gallery = json_decode($other, true);
                    $gallery[$request->typeid]  = $input['imagename'];
                    $json = json_encode($gallery);
                    $update = products::find($request->code);

                    $update->other = $json;
                    $update->save();
                  }
                  return redirect('product/add/'.$request->code);
               break;


         default:
            # code...
            break;
      }
   }



   public function search(Request $request){

    $products = products::where('product_number', 'like', '%'.$request->keyword.'%')
    ->orWhere('product_name', 'like', '%'.$request->keyword.'%')->limit(10)->get();

     $output = '';
     $count = count($products);
     if($count>1){
       foreach ($products as $product) {
       $branch = branches::find($product->added_branch);
       $brand = brands::find($product->product_brand);
       $output .= '<li class="list-group-item">'.$product->product_name.'
                   <span class="ajborderl">'.$brand->brand_name.'</span>
                   <img src="http://127.0.0.1:8000/icons/ok.png" width="20px" style="margin-left: 10px;">
                   <a href="http://127.0.0.1:8000/product/add/'.$product->id.'"><span class="ajborderr"><img src="https://png.icons8.com/edit/office/30" title="Location" width="20" height="20">EDIT</span></a>
                   <span class="ajborderr"><img src="https://png.icons8.com/location/office/30" title="Location" width="20" height="20"> '.$branch->branch_name.'</span>
                   <span class="ajborderr"><img src="https://png.icons8.com/rupee/color/24" title="Location" width="20" height="20"><strike> '.$product->product_mrp.'</strike></span>
                   <span class="ajborderr"><img src="https://png.icons8.com/shopping-cart/color/24" title="Location" width="20" height="20"> '.common::stock($product->id).'</span>
                   </li>';
      }

     }else{
       $output .= '<li class="list-group-item">No Products found</li>';
     }


     return $output;
   }

}
