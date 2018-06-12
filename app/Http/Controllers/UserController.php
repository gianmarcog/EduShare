<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 31-May-18
 * Time: 15:51
 */

namespace App\Http\Controllers;

use App\hochschulen;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

//use Intervention\Image\Image;

class UserController
{
    public function index()
    {
        return view('account');
    }

    public function edit()
    {
        $hochschulen = hochschulen::all();
        return view('bearbeiten')->with('hs', $hochschulen);
    }

    public function update(Request $request)
    {
        Auth::user()->email = $request->get('email');
        Auth::user()->hochschule = $request->get('hochschule');
        Auth::user()->save();
        return view('account');
    }

    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/image/ProfilePics/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('account');
    }

    public function delete(){
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

            return redirect('/')->with('global', 'Dein Account wurde gelöscht!');
        }
    }
}