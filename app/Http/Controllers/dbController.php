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
        return view('aktivitaeten')->with('a',$aktivitaeten);
    }
    public function hochschulen(){
        $hochschulen = hochschulen::all();
        return view('hochschulen')->with('hs',$hochschulen);
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
        $hochschule = hochschulen::where('name', 'LIKE', '%'.$query.'%')
            ->orwhere('standort', 'LIKE', '%'.$query.'%')->get();
        $aktivitaeten = aktivitaeten::where('name', 'LIKE', '%'.$query.'%')
            ->orwhere('standort', 'LIKE', '%'.$query.'%')->get();
        $vorlesungen = vorlesungen::where('name', 'LIKE', '%'.$query.'%')
            ->orwhere('professor', 'LIKE', '%'.$query.'%')->get();
        return view('searchresults')->with('hs',$hochschule)->with('a',$aktivitaeten)->with('v',$vorlesungen);

    }

    public function informationenHs(Request $request, $id){
        $hochschule = hochschulen::where('id','=',$id)->get();
        return view('hochschule')->with('hs',$hochschule);
    }

    public function informationenAk(Request $request, $id){
        $aktivitaet = aktivitaeten::where('id','=',$id)->get();
        return view('aktivitaet')->with('a',$aktivitaet);
    }
}
