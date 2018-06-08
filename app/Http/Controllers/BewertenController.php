<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 03-Jun-18
 * Time: 14:46
 */

namespace App\Http\Controllers;

use App\aktivitaeten;
use App\Bewertungen;
use App\hochschulen;
use App\vorlesungen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BewertenController
{
    public function showAll()
    {
        $hochschule = hochschulen::where('name', '=', Auth::user()->hochschule)->first();

        $aktivitaeten = aktivitaeten::all();

        $vorlesungen = vorlesungen::where('hid', '=', $hochschule->id)->get();

        $bewertungHochschule = Bewertungen::where('user_id', '=', Auth::user()->id)->where('bezeichnung', '=', Auth::user()->hochschule)->first();

        $bewertungen = Bewertungen::where('user_id', '=', Auth::user()->id)->get();

        $testbewertungen = Bewertungen::where('user_id', '=', Auth::user()->id)->where('bezeichnung','!=',Auth::user()->hochschule)->first();

        if (empty($bewertungHochschule)) {
            $bewertungHochschule = new Bewertungen();
            $bewertungHochschule->bewertung = 'nicht bewertet';
        }
        if (empty($testbewertungen)) {
            $bewertungen = new Bewertungen();
            $bewertungen->bewertung = 'nicht bewertet';
        }
        include'functions.php';
        debug_to_console('Hochschule: ');
        debug_to_console($bewertungHochschule->bewertung);
        debug_to_console('Andere: ');
        debug_to_console($bewertungen->bewertung);
        return view('bewerten')
            ->with('h', $hochschule)
            ->with('as', $aktivitaeten)
            ->with('vs', $vorlesungen)
            ->with('bewertungHochschule', $bewertungHochschule)
            ->with('bewertungen',$bewertungen);
    }

    public function store(Request $request)
    {
        $bewertung = new Bewertungen();
        $bewertung->user_id = Auth::user()->id;
        $bewertung->bezeichnung = $request->get('name');
        $bewertung->bewertung = $request->get('bewertung');
        $bewertung->save();
        return redirect('/bewerten');
    }

}