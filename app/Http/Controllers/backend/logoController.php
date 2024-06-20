<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class logoController extends Controller
{

    public function listLogo(){
        $logo=Logo::query()->orderBy('id','DESC')->get();
        return view('backend.list-logo',compact('logo'));
    }

    public function addLogo(){
        return view('backend.add-logo');
    } 

    public function addLogoSubmit(Request $request){
        $request->validate([
            'filelogo'=>'required',
        ]);
        $input=$request->all();
        if($filename=$request->file('filelogo')){
            $image=$this->moveUpload($filename);
            $input['thumbnail']=$image;
        }
        $res=Logo::create($input);
        $res->save();
        return redirect('/list-logo');
    }
    
    public function editLogo(Logo $logo){
        return view('backend.edit-logo',compact('logo'));
    }

    public function editLogoSubmit(Request $request, Logo $logo){
        $input = $request->all();
        if($filename=$request->file('thumbnail')){
            if(empty($request->file('thumbnail'))){
                $input['thumbnail']=$request->old_image;
            }else{
                $input['thumbnail']=$this->moveUpload($filename);
            }
        }
        $logo->update($input);
        $logo->save();
        return redirect('/list-logo');
    }

    public function deleteLogo(Request $request){
       $remove_id=$request->input('remove-id');
       Logo::query()->where('id',$remove_id)->delete();
       return redirect('list-logo');
    }
    
}
