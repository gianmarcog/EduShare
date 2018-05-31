<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 31-May-18
 * Time: 15:51
 */

namespace App\Http\Controllers;


use http\Env\Request;

class UserController
{
    public function index()
    {
        return view('account');
    }

    public function public_avatar(Request $request){

    }
}