<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account');
    }
    public function showLogin()
    {
        // show the form
        return View::make('login');
    }
    public function start(){
        return view('welcome');
    }

    public function doLogin()
    {
// process the form
    }
}
