<?php

namespace App\Http\Controllers;

use App\aktivitaeten;
use App\hochschulen;
use App\vorlesungen;
use Illuminate\Http\Request;

class dbController extends Controller
{
    public function aktivitaeten(){
        $aktivitaeten = aktivitaeten::all();
        return view('ranking')->with('a',$aktivitaeten);
    }
    public function ranking() {
        $hochschule = hochschulen::all();
        $aktivitaeten = aktivitaeten::all();
        $vorlesungen = vorlesungen::all();
        return view('ranking')->with('hs',$hochschule)->with('a',$aktivitaeten)->with('v',$vorlesungen);
    }

    public function store(Request $request) {
        $hochschule = new hochschulen();
        $hochschule->name = $request->name;
        $hochschule->standort = $request->standort;
        $hochschule->ranking = $request->ranking;
        $hochschule->save();

        // shorter: $currency = Currency::create($request->all());
        return $this->index();
    }

    public function show(Request $request,$id) {
        $hochschule = hochschulen::find($id);
        return view('aktivitaeten')->with('h',$hochschule);
    }

    public function destroy(Request $request,$id) {
        $hochschule = hochschulen::find($id);
        $hochschule->delete();
        return $this->index();
    }

    public function search(Request $request){
        $query=$request->input('search');
        $results = hochschulen::where('name', 'LIKE', '%'.$query.'%')
            ->orwhere('standort', 'LIKE', '%'.$query.'%')->get();
        return view('searchresults')->with('hs',$results);

    }
}
