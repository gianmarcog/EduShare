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

        $aktivitaeten = aktivitaeten::where('standort','=',$hochschule->standort)->get();

        $vorlesungen = vorlesungen::where('hid', '=', $hochschule->id)->get();

        $bewertungHochschule = Bewertungen::where('user_id', '=', Auth::user()->id)->where('bezeichnung', '=', Auth::user()->hochschule)->first();

        $bewertungen = Bewertungen::where('user_id', '=', Auth::user()->id)->get();

        if (empty($bewertungHochschule)) {
            $bewertungHochschule = new Bewertungen();
            $bewertungHochschule->bewertung = 'nicht bewertet';
        }

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
        $this->refresh($request->get('name'));
        return redirect('/bewerten');
    }

    public function refresh($bezeichnung){
        $bewertungen = Bewertungen::where('bezeichnung', '=', $bezeichnung)->get();
        $sum=0;
        $count=0;
        foreach ($bewertungen as $bewertung){
            $sum += $bewertung->bewertung;
            $count++;
        }
        $average=$sum / $count;
        $hochschule = hochschulen::where('name', '=', $bezeichnung)->first();
        $aktivitaet = aktivitaeten::where('name', '=', $bezeichnung)->first();
        $vorlesung = vorlesungen::where('name', '=', $bezeichnung)->first();
        if (!empty($hochschule)) {
            $hochschule->ranking = $average;
            $hochschule->save();
        }
        if (!empty($aktivitaet)) {
            $aktivitaet->ranking = $average;
            $aktivitaet->save();
        }
        if (!empty($vorlesung)) {
            $vorlesung->ranking = $average;
            $vorlesung->save();
        }
    }

}