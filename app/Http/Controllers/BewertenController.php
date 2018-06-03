<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 03-Jun-18
 * Time: 14:46
 */

namespace App\Http\Controllers;
use App\aktivitaeten;
use App\hochschulen;
use App\vorlesungen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BewertenController
{
    public function showAll(){
        $hochschule = hochschulen::where('name','=',Auth::user()->hochschule)->first();

        $aktivitaeten = aktivitaeten::all();

        $vorlesungen = vorlesungen::where('hid','=',$hochschule->id)->get();

        return view('bewerten')->with('h', $hochschule)->with('as', $aktivitaeten)->with('vs', $vorlesungen);
    }

}