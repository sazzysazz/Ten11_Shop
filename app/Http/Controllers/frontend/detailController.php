<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class detailController extends Controller
{
    public function productDaltail(Product $product){
        $relatedProducts = Product::where('cate_id', $product->cate_id)
                              ->where('id', '!=', $product->id)
                              ->take(4)
                              ->get();
        Product::query()->where('id',$product->id)->update(['views'=>$product->views+1]);
        return view('frontend.product-detail',compact('product','relatedProducts'));
    }
}
