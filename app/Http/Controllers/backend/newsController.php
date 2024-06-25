<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function listNews(){
        $news=news::query()
                    ->orderBy('id','DESC')
                    ->get();
        return view('Backend.list-news',compact('news'));
    }
    public function addNews(){
        return view('Backend.add-news');
    }
    public function addNewsSubmit(Request $request){
        $request->validate([
            'image'=>'required',
            'title'=>'required|string',
            'description'=>'required|string'
        ]);
        $input=$request->all();
        if($filename=$request->file('image')){
            $image=$this->moveUpload($filename);
            $input['image']=$image;
        }
        $res=news::create($input);
        $res->save();
        if($res){
            return redirect('/add-news');
        }
    }
    public function editNews(news $news){
        return view('Backend.edit-news',compact('news'));
    }
    public function editNewsSubmit(Request $request,news $news){
        $input=$request->all();
        if(empty($filename=$request->file('image'))){
            $input['image']=$request->old_image;
        }else{
                $image=$this->moveUpload($filename);
                $input['image']=$image;
        }
        $news->update($input);
        $news->save();
        return redirect('/list-news');
    }
    public function deleteNews(Request $request){
        $remove_id=$request->input('remove-id');
        $res=news::query()->where('id',$remove_id)->delete();
        if($res){
            return redirect('/list-news');
        }
    }

}