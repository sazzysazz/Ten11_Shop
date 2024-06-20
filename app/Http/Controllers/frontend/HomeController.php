<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getAllPro() {
        $newProducts = Product::query()->orderBy('id', 'DESC')->limit(8)->get();
        $popularProducts = Product::query()->orderBy('views', 'DESC')->limit(8)->get();
        $promotionProducts = Product::query()->where('regular_price', '>', 0)->limit(8)->get();
        return view('frontend.home', compact('newProducts', 'popularProducts', 'promotionProducts'));
    }
}
