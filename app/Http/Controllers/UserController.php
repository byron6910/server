<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){

        return view('profile',['user'=>Auth::user()]);
    }

    public function update_profile(Request $request ){
        
        if($request->hasFile('foto')){
            
            $foto=$request->file('foto');
            $user=Auth::user();
            $extension=$user->name.'.'.$foto->getClientOriginalExtension();
            Image::make($foto)->resize(200,200)->save(public_path('imagenes/usuarios/fotos/'.$extension));
           
            $user->foto=$extension;
            $user->save();

    
    }
    return view('profile',['user'=>Auth::user()]);
    }
}