<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class productsController extends Controller
{
    public function listProduct(){
        $product = Product::query()
                            ->join('categories', 'products.cate_id', '=', 'categories.id')
                            ->join('users', 'products.user_id', '=', 'users.id')
                            ->select('products.*', 'categories.name AS category','users.name AS admin')
                            ->orderBy('id', 'DESC')
                            ->get();
        return view('backend.list-product', compact('product'));
    }
    
    public function addProduct(){
        $category = Category::query()->orderBy('id', 'DESC')->get();
        return view('backend.add-product', compact('category'));
    }

    public function addProductSubmit(Request $request)
    {
        $request->validate([
            'proName' => 'required',
            'qty' => 'required',
            'sale_price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();
        if($filename=$request->file('thumbnail')){
            $input['thumbnail']=$this->moveUpload($filename);
        }
        $regular_price=$request->regular_price;
        if(empty($regular_price)){
            $input['regular_price']=0;
        }else{
            $input['regular_price']=$regular_price;
        }
        $input['size'] = implode(',',$request->size);
        $input['color'] = implode(',',$request->color);
        $input['user_id']=Auth::user()->id;
        $input['cate_id']=$request->category;
        $input['views']=0;
        $res = Product::create($input);
        $res->save();
        if ($res) {
            return redirect()->route('add-product')->with('message', 'Product updated successfully');
        } else {
            return redirect()->route('add-product')->with('message', 'Product update failed');
        }
    }
    
    public function editProduct(Product $product)
    {
        $category = Category::query()->orderBy("id", "DESC")->get();
        $size = explode(',', $product->size);
        $color = explode(',', $product->color);
        $getCate = Product::query()
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS category')
            ->where('products.id', $product->id)
            ->first();
        return view('Backend.edit-product', compact(
            'product',
            'category',
            'size',
            'color',
            'getCate'
        ));
    }
    
    public function editProductSubmit(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'proName' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'regular_price' => 'nullable|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'size' => 'required|array',
            'color' => 'required|array',
            'category' => 'required|integer|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);
    
        $input = $request->all();
    
        if($fiename=$request->file('thumbnail')){
            if(empty($fiename)){
                $input['thumbnail']=$request->old_img;
            }else{
                $input['thumbnail']= $this->moveUpload($fiename);
            }
        }
    
        $input['regular_price'] = $request->regular_price ?? 0;
        $input['size'] = implode(',', $request->size);
        $input['color'] = implode(',', $request->color);
        $input['user_id'] = Auth::user()->id;
        $input['cate_id'] = $request->category;
    
        $res = $product->update($input);
    
        if ($res) {
            return redirect()->route('list-product')->with('message', 'Product updated successfully');
        } else {
            return redirect()->route('edit-product')->with('message', 'Product update failed');
        }
    }
    public function deleteProduct(Request $request){
        $remove_id=$request->input('remove-id');
        $res=Product::query()->where('id',$remove_id)->delete();
        if($res){
            return redirect('/list-product');
        }
    }




    public function getAllPro() {
        $newProducts = Product::query()->orderBy('id', 'DESC')->limit(8)->get();
        $popularProducts = Product::query()->orderBy('views', 'DESC')->limit(8)->get();
        $promotionProducts = Product::query()->where('regular_price', '>', 0)->limit(8)->get();
        return view('frontend.home', compact('newProducts', 'popularProducts', 'promotionProducts'));
    }
    public function shopProduct(){
        $product=Product::query()->orderby('id','DESC')->get();
        return view('frontend.shop',compact('product'));
    }
    public function productDaltail(Product $product){
        $relatedProducts = Product::where('cate_id', $product->cate_id)
                              ->where('id', '!=', $product->id)
                              ->take(4)
                              ->get();
        return view('frontend.product-detail',compact('product','relatedProducts'));
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
    public function getByMan() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'Men')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByWomen() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'Women')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByBoy() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'boy')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByGirl() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'girl')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByshirt() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'shirt')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByjeans() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'Jeans')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByCargo() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'Cargo')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByshoes() {
        $product = Product::query()
                        ->orderBy('id', 'DESC')
                        ->join('categories', 'products.cate_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category')
                        ->where('categories.name', 'Shoes')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByHightprice(){
        $product=Product::query()
                        ->orderBy('sale_price','DESC')
                        ->limit('6')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function getByLowPrice(){
        $product=Product::query()
                        ->orderBy('sale_price','ASC')
                        ->limit('6')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function promotionProduct(){
        $product=Product::query()
                        ->orderBy('id','DESC')
                        ->where('regular_price','!=',0)
                        ->limit('9')
                        ->get();
        return view('frontend.shop',compact('product'));
    }
    public function searchProduct(Request $request){
        $search = $request->input('search');
        $products = Product::where('proName', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%')
                            ->get();
        return view('frontend.search', compact('products'));
    }
    


    
}
