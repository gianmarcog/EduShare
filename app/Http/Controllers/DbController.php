<?php

namespace App\Http\Controllers;

use App\aktivitaeten;
use App\hochschulen;
use App\vorlesungen;
use Illuminate\Http\Request;

class dbController extends Controller
{
    public function aktivitaeten()
    {
        $aktivitaeten = aktivitaeten::all();
        return view('aktivitaeten')->with('a', $aktivitaeten);
    }

    public function hochschulen()
    {
        $hochschulen = hochschulen::all();
        return view('hochschulen')->with('hs', $hochschulen);
    }

    public function ranking()
    {
        $hochschule = hochschulen::all();
        $aktivitaeten = aktivitaeten::all();
        $vorlesungen = vorlesungen::all();
        return view('ranking')->with('hs', $hochschule)->with('a', $aktivitaeten)->with('v', $vorlesungen);
    }

    public function store(Request $request)
    {
        $hochschule = new hochschulen();
        $hochschule->name = $request->name;
        $hochschule->standort = $request->standort;
        $hochschule->ranking = $request->ranking;
        $hochschule->save();

        // shorter: $currency = Currency::create($request->all());
        return $this->index();
    }

    public function show($id)
    {
        $hochschule = hochschulen::find($id);
        return view('aktivitaeten')->with('h', $hochschule);
    }

    public function destroy($id)
    {
        $hochschule = hochschulen::find($id);
        $hochschule->delete();
        return $this->index();
    }

    public function informationenHs($id)
    {
        $hochschule = hochschulen::where('id', '=', $id)->first();
        $vorlesungen = vorlesungen::where('hid','=',$id)->get();
        return view('hochschule')->with('hochschule', $hochschule)->with('vs',$vorlesungen);
    }

    public function informationenAk($id)
    {
        $aktivitaet = aktivitaeten::where('id', '=', $id)->first();
        return view('aktivitaet')->with('aktivitaet', $aktivitaet);
    }


}
