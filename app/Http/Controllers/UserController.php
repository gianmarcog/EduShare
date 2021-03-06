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
use App\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
            if(!Storage::disk('public_uploads')->putFileAs('/', $avatar, $filename)) {
                return false;
            }
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('account');
    }

    public function delete()
    {
        $user = User::find(Auth::user()->id);
        $role = role::where('user_id','=',Auth::user()->id)->first();

        Auth::logout();

        if ($user->delete() && $role->delete()) {

            return redirect('/')->with('global', 'Dein Account wurde gelöscht!');
        } else {
            return Redirect::back();
        }
    }
}