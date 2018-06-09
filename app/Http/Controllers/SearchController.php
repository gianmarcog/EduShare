<?php

namespace App\Http\Controllers;

use App\aktivitaeten;
use App\hochschulen;
use App\vorlesungen;
use Illuminate\Http\Request;

class searchController
{
    public function livesearch(Request $request)
    {
        $query = $request->get('value');
        $hochschulen = hochschulen::where('name', 'LIKE', '%' . $query . '%')
            ->orwhere('standort', 'LIKE', '%' . $query . '%')->get();
        $aktivitaeten = aktivitaeten::where('name', 'LIKE', '%' . $query . '%')
            ->orwhere('standort', 'LIKE', '%' . $query . '%')->get();
        $vorlesungen = vorlesungen::where('name', 'LIKE', '%' . $query . '%')
            ->orwhere('professor', 'LIKE', '%' . $query . '%')->get();

        $html = '';
        if (count($hochschulen) !== 0) {
            $html .= '<div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Hochschulen</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Name</th>
                        <th id="column" class="notmobile">Standort</th>
                        <th id="column">Ranking</th>
                        <th id="column">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>';
            foreach ($hochschulen as $hochschule) {
                $content = '<tr>
                            <td id="column">' . $hochschule->name . '</td>
                            <td id="column" class="notmobile">' . $hochschule->standort . '</td>
                            <td id="column">' . $hochschule->ranking . '</td>
                            <td>
                                <form action="/hochschule/' . $hochschule->id . '">
                                    <button type="submit" class="btn btn-primary btn-url">Informationen</button>
                                </form>
                            </td>
                        </tr>';
                $html .= $content;
            }
            $html .= '</tbody>
                </table>
            </div>
        </div>
    </div>';
        }

        if (count($aktivitaeten) !== 0) {
            $html .= '<div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Aktivitäten</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Aktivität</th>
                        <th id="column" class="notmobile">Standort</th>
                        <th id="column">Ranking</th>
                        <th id="column">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>';
            foreach ($aktivitaeten as $aktivitaet) {
                $content = '<tr>
                            <td id="column">' . $aktivitaet->name . '</td>
                            <td id="column" class="notmobile">' . $aktivitaet->standort . '</td>
                            <td id="column">' . $aktivitaet->ranking . '</td>
                            <td>
                                <form action="/aktivitaet/' . $aktivitaet->id . '">
                                    <button type="submit" class="btn btn-primary btn-url">Informationen</button>
                                </form>
                            </td>
                        </tr>';
                $html .= $content;
            }
            $html .= '</tbody>
                </table>
            </div>
        </div>
    </div>';
        }

        if (count($vorlesungen) !== 0) {
            $html .= '<div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Vorlesungen</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Name</th>
                        <th id="column" class="notmobile">Professor</th>
                        <th id="column">Ranking</th>
                        <th id="column">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>';
            foreach ($vorlesungen as $vorlesung) {
                $content = '<tr>
                            <td id="column">' . $vorlesung->name . '</td>
                            <td id="column" class="notmobile">' . $vorlesung->professor . '</td>
                            <td id="column">' . $vorlesung->ranking . '</td>
                            <td>
                                <form action="/hochschule/' . $vorlesung->hid . '">
                                    <button type="submit" class="btn btn-primary btn-url">Hochschule</button>
                                </form>
                            </td>
                        </tr>';
                $html .= $content;
            }
            $html .= '</tbody>
                </table>
            </div>
        </div>
    </div>';
        }
        if(count($hochschulen) === 0 && count($aktivitaeten) === 0 && count($vorlesungen) === 0){
            $html .= '<h4 class="col-4 mx-auto">Keine Ergebnisse gefunden!</h4>';
        }
        return $html;
    }
}