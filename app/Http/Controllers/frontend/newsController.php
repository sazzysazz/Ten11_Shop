<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function getAllNews(){
        $allNews=news::query()
                    ->orderBy('id','DESC')
                    ->paginate(8);
        return view('frontend.news',compact('allNews'));
    }
    public function newDetail(news $news){
        $relateNews=news::query()
                                ->orderBy('id','DESC')
                                ->limit(4)
                                ->where('id','!=',$news->id)
                                ->get();
        return view('frontend.news-detial',compact('news','relateNews'));
    }
}