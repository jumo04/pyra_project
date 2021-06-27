<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    //

    function __construct()
    {
         $this->middleware('permission:historia-listar|historia-crear|historia-editar|historia-delete', ['only' => ['index','show']]);
         $this->middleware('permission:historia-crear', ['only' => ['create','store']]);
         $this->middleware('permission:historia-editar', ['only' => ['edit','update']]);
    }

    public function index(Request $request) {
        $places = DB::select('select * from places');
        return view('history' , ['place' => $places]);
      }

    public function show(Request $request) {
        $history = DB::select('select * from history');
        return view('history', ['history' => $history]);
    }

    public function store(Request $request) {

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
        return back()->with('success' , 'Historia actualizado');
    }

    public function update(Request $request) {

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
