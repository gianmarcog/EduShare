<?php

namespace App\Http\Controllers;

use App\hochschulen;
use Illuminate\Http\Request;

class dbController extends Controller
{
    public function index() {
        $hochschule = hochschulen::all();
        return view('ranking')->with('hs',$hochschule);
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
