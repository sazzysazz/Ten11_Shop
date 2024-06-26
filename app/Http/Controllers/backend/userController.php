<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function register(){
        return view('backend.register');
    }

    public function registerSubmit(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'profile'=>'required',
        ]);

        $input = $request->all();
        if($filename=$request->file('profile')){
            $image = $this->moveUpload($filename);
            $input['profile']=$image;
        }

        $input['password']=Hash::make($request->password);
        $res=User::create($input);
        $res->save();
        if($res){
            return view('backend.login');
        }
    }

    public function login(){
        return view('backend.login');
    }

    public function signinSubmit(Request $request){
        $request->validate([
            'name_email'=>'required',
            'password'=>'required',
        ]);
        $name_email=$request->input('name_email');
        $password=$request->input('password');
        
        if(Auth::attempt(['name'=>$name_email,'password'=>$password])){
            return redirect('/admin');
        }elseif(Auth::attempt(['email'=>$name_email,'password'=>$password])) {
            return redirect('/admin');
        }else{
            return redirect('/signin');
        }
    }

    public function editProfile(User $user){
        return view('backend.edit-profile',compact('user'));
    }
    public function editProfileSubmit(Request $request,User $user){
        $input = $request->all();
        if($filename=$request->file('profile')){
            if(empty($request->file('profile'))){
                $input['profile']=$request->old_image;
            }else{
                $input['profile']=$this->moveUpload($filename);
            }
        }
        $user->update($input);
        $user->save();
        return redirect('/admin');
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/login');
    }
}
