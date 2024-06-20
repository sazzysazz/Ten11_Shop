<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryoController extends Controller
{
    public function listCategory(){
        $category=Category::query()->orderBy('id','DESC')->get();
        return view('backend.list-category',compact('category'));
    }
    public function addCategory(){
        return view('backend.add-category');
    }

    public function addCategorySubmit(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $input=$request->all();
        $res=Category::create($input);
        $res->save();
        if($res){
            return redirect('list-category');
        }
    }

    public function editCategory(Category $category){
        return view('backend.edit-category',compact('category'));
    }

    public function editcategorySubmit(Request $request,Category $category){
        $input = $request->all();
        $category->update($input);
        $category->save();
        return redirect('/list-category');
    }

    public function DeleteCategory(Request $request){
        $remove_id=$request->input('remove-id');
        $res=Category::query()->where('id',$remove_id)->delete();
        if($res){
            return redirect('/list-category');
        }
    }
 
}
