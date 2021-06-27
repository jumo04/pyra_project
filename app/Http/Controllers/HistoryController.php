<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Lottery;
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
        $lotteries = Lottery::all();
        return view('history' , compact('lotteries'));
      }

    public function show(Request $request) {
        $histories = History::all();
        return view('history', compact( 'histories'));
    }

    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'day'  => 'required',
            'total' => 'required',
            'winner'  => 'required',
            'lottery_id' => 'required'
         ]);

        //  Store data in database
        History::create($request->all());

        $history = new History();
        $history->day = $request->get('day');
        $history->total = $request->get('total');
        $history->winner = $request->get('winner');
        $lottery = Lottery::find($request->input('lottery_id'));

        $history->lottery()->save($lottery);


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
