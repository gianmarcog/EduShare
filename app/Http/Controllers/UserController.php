<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 31-May-18
 * Time: 15:51
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;

class UserController
{
    public function index()
    {
        return view('account');
    }

    public function public_avatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/image/ProfilePics/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('account');
    }
}