<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class frontendproductsController extends Controller
{

    public function shop(Request $request){
        $allProduct=Product::query();
        if($request->cate){
            $allProduct->where('cate_id','=',$request->cate);
        }elseif($request->price){
            if($request->price =='max'){
                $allProduct->orderBy('sale_price','DESC');
            }else{
                $allProduct->orderBy('sale_price','ASC');
            }
        }elseif($request->promotion){
            $allProduct->where('regular_price','<>',0);
        }
        $products=$allProduct->paginate(6);
        $category=Category::query()
                            ->orderBy('id','DESC')
                            ->get();
        return view('frontend.shop',compact('products','category'));
    }









    public function BuyProduct(Product $product, $qty = 1) {
        $regularPrice = $product->regular_price ?? 0;
        $salePrice = $product->sale_price ?? 0;
        $discountAmount = ($regularPrice > 0) ? ($regularPrice - $salePrice) : 0;
        $qty = max($qty, 1);
        $totalPayment = $salePrice * $qty;
        return view('frontend.buyProduct', compact('product', 'discountAmount', 'qty', 'totalPayment'));
    } 
    public function BuyProductsubmit(Product $product){
        $id = $product->id;
        return redirect('/buy-product/'.$id)->with('message', 'Your purchase has been successful');
    }
    // public function getByMan() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'Men')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByWomen() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'Women')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByBoy() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'boy')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByGirl() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'girl')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByshirt() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'shirt')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByjeans() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'Jeans')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByCargo() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'Cargo')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByshoes() {
    //     $product = Product::query()
    //                     ->orderBy('id', 'DESC')
    //                     ->join('categories', 'products.cate_id', '=', 'categories.id')
    //                     ->select('products.*', 'categories.name AS category')
    //                     ->where('categories.name', 'Shoes')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByHightprice(){
    //     $product=Product::query()
    //                     ->orderBy('sale_price','DESC')
    //                     ->limit('6')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function getByLowPrice(){
    //     $product=Product::query()
    //                     ->orderBy('sale_price','ASC')
    //                     ->limit('6')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    // public function promotionProduct(){
    //     $product=Product::query()
    //                     ->orderBy('id','DESC')
    //                     ->where('regular_price','!=',0)
    //                     ->limit('9')
    //                     ->get();
    //     return view('frontend.shop',compact('product'));
    // }
    public function searchProduct(Request $request){
        $search = $request->input('search');
        $products = Product::where('proName', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%')
                            ->get();
        return view('frontend.search', compact('products'));
    }
}
