<?php

namespace App\Http\Controllers;

use App\hochschulen;
use Illuminate\Http\Request;

class hochschulenController extends Controller
{
    public function index() {
        $hochschule = hochschulen::all();
        return view('currencyList')->with('cs',$hochschule);
    }

    public function store(Request $request) {
        $hochschule = new hochschulen();
        $hochschule->currency_iso = $request->currency_iso;
        $hochschule->eur_fxrate = $request->eur_fxrate;
        $hochschule->save();

        // shorter: $currency = Currency::create($request->all());
        return $this->index();
    }

    public function show(Request $request,$id) {
        $hochschule = hochschulen::find($id);
        return view('currencyView')->with('c',$hochschule);
    }

    public function destroy(Request $request,$id) {
        $hochschule = hochschulen::find($id);
        $hochschule->delete();
        return $this->index();
    }
}
