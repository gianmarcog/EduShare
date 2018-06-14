<?php
/**
 * Created by IntelliJ IDEA.
 * User: René
 * Date: 13-Jun-18
 * Time: 20:49
 */

namespace App\Http\Controllers;

use App\aktivitaeten;
use App\hochschulen;
use App\vorlesungen;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController
{
    public function index(){
        $users = User::select()
            ->orderBy('id')
            ->get()
        ;
        // $test_columns = Schema::getColumnListing('tests');
        $user = new hochschulen();
        $fillable_columns = $user->getFillable();
        foreach ($fillable_columns as $key => $value) {
            $user_Spalten[$value] = $value;
        }

        $hochschulen = hochschulen::select()
            ->orderBy('id')
            ->get()
        ;
        // $test_columns = Schema::getColumnListing('tests');
        $hochschule = new hochschulen();
        $fillable_columns = $hochschule->getFillable();
        foreach ($fillable_columns as $key => $value) {
            $hochschule_Spalten[$value] = $value;
        }

        $aktivitaeten = aktivitaeten::select()
            ->orderBy('id')
            ->get()
        ;
        // $test_columns = Schema::getColumnListing('tests');
        $aktivitaet = new aktivitaeten();
        $fillable_columns = $aktivitaet->getFillable();
        foreach ($fillable_columns as $key => $value) {
            $aktivitaeten_Spalten[$value] = $value;
        }

        $vorlesungen = vorlesungen::select()
            ->orderBy('id')
            ->get()
        ;
        // $test_columns = Schema::getColumnListing('tests');
        $vorlesung = new vorlesungen();
        $fillable_columns = $vorlesung->getFillable();
        foreach ($fillable_columns as $key => $value) {
            $vorlesungen_Spalten[$value] = $value;
        }
        return view('admin')
            ->with('user', $users)
            ->with('user_Spalten', $user_Spalten)
            ->with('hochschulen', $hochschulen)
            ->with('hochschule_Spalten', $hochschule_Spalten)
            ->with('aktivitaeten', $aktivitaeten)
            ->with('aktivitaeten_Spalten', $aktivitaeten_Spalten)
            ->with('vorlesungen', $vorlesungen)
            ->with('vorlesungen_Spalten', $vorlesungen_Spalten)
            ;
    }

    public function updateHS(Request $request, $id){
        $test = hochschulen::find($id);
        $column_name = Input::get('name');
        $column_value = Input::get('value');

        if( Input::has('name') && Input::has('value')) {
            $test = Test::select()
                ->where('id', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);
    }

    public function bulk_updateHS(Request $request){
        if (Input::has('ids_to_edit') && Input::has('bulk_name') && Input::has('bulk_value')) {
            $ids = Input::get('ids_to_edit');
            $bulk_name = Input::get('bulk_name');
            $bulk_value = Input::get('bulk_value');
            foreach ($ids as $id) {
                $test = hochschulen::select()
                    ->where('id', '=', $id)
                    ->update([$bulk_name => $bulk_value]);
            }
            // return Redirect::route('client/leads')->with('message', $message);
            $message = "Änderungen erfolgreich gespeichert";
        } else {
            $message = "Fehler. Falsche Daten erhalten";
            return Redirect::back()->withErrors(array('message' => $message))->withInput();
        }
        return Redirect::back()->with('message', $message);
    }

    public function updateAK(Request $request, $id){
        $test = aktivitaeten::find($id);
        $column_name = Input::get('name');
        $column_value = Input::get('value');

        if( Input::has('name') && Input::has('value')) {
            $test = Test::select()
                ->where('id', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);
    }

    public function bulk_updateAK(Request $request){
        if (Input::has('ids_to_edit') && Input::has('bulk_name') && Input::has('bulk_value')) {
            $ids = Input::get('ids_to_edit');
            $bulk_name = Input::get('bulk_name');
            $bulk_value = Input::get('bulk_value');
            foreach ($ids as $id) {
                $test = aktivitaeten::select()
                    ->where('id', '=', $id)
                    ->update([$bulk_name => $bulk_value]);
            }
            // return Redirect::route('client/leads')->with('message', $message);
            $message = "Änderungen erfolgreich gespeichert";
        } else {
            $message = "Fehler. Falsche Daten erhalten";
            return Redirect::back()->withErrors(array('message' => $message))->withInput();
        }
        return Redirect::back()->with('message', $message);
    }

    public function updateVL(Request $request, $id){
        $test = vorlesungen::find($id);
        $column_name = Input::get('name');
        $column_value = Input::get('value');

        if( Input::has('name') && Input::has('value')) {
            $test = Test::select()
                ->where('id', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);
    }

    public function bulk_updateVL(Request $request){
        if (Input::has('ids_to_edit') && Input::has('bulk_name') && Input::has('bulk_value')) {
            $ids = Input::get('ids_to_edit');
            $bulk_name = Input::get('bulk_name');
            $bulk_value = Input::get('bulk_value');
            foreach ($ids as $id) {
                $test = vorlesungen::select()
                    ->where('id', '=', $id)
                    ->update([$bulk_name => $bulk_value]);
            }
            // return Redirect::route('client/leads')->with('message', $message);
            $message = "Änderungen erfolgreich gespeichert";
        } else {
            $message = "Fehler. Falsche Daten erhalten";
            return Redirect::back()->withErrors(array('message' => $message))->withInput();
        }
        return Redirect::back()->with('message', $message);
    }

    public function updateUS(Request $request, $id){
        $test = User::find($id);
        $column_name = Input::get('name');
        $column_value = Input::get('value');

        if( Input::has('name') && Input::has('value')) {
            $test = Test::select()
                ->where('id', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);
    }

    public function bulk_updateUS(Request $request){
        if (Input::has('ids_to_edit') && Input::has('bulk_name') && Input::has('bulk_value')) {
            $ids = Input::get('ids_to_edit');
            $bulk_name = Input::get('bulk_name');
            $bulk_value = Input::get('bulk_value');
            foreach ($ids as $id) {
                $test = User::select()
                    ->where('id', '=', $id)
                    ->update([$bulk_name => $bulk_value]);
            }
            // return Redirect::route('client/leads')->with('message', $message);
            $message = "Änderungen erfolgreich gespeichert";
        } else {
            $message = "Fehler. Falsche Daten erhalten";
            return Redirect::back()->withErrors(array('message' => $message))->withInput();
        }
        return Redirect::back()->with('message', $message);
    }
}