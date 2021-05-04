<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    //
    public function createForm(Request $request) {
        $places = DB::select('select * from places');
        return view('history' , ['place' => $places]);
      }

    public function ShowHistory(Request $request) {
        $history = DB::select('select * from history');
        return view('history', ['history' => $history]);
    }

    public function HistoryInput(Request $request) {

        // Form validation
        $this->validate($request, [
            'day',
            'total_count' => 'required',
            'total' => 'required',
            'winner',
            'place_id' => 'required'
         ]);

        //  Store data in database
        History::create($request->all());

        // 
        return back()->with('success');
    }



}
