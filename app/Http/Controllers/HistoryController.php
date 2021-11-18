<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Lottery;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    //

    /* function __construct()
    {
         $this->middleware('permission:listar-historial|crear-historial|editar-historial|eliminar-historial', ['only' => ['index','show']]);
         $this->middleware('permission:crear-historial', ['only' => ['create','store']]);
         $this->middleware('permission:editar-historial', ['only' => ['edit','update']]);
         $this->middleware('permission:eliminar-historial', ['only' => ['destroy']]);
    }
 */
    public function index(Request $request) {
        $histories = History::orderBy('id','ASC')->paginate(10);
        return view('history.index',compact('histories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
      }


    public function number(Request $request){
        return view('history.number');
    }

    public function numberHistory(Request $request) {

        $numbers = $request -> get('num');
        $edate = $request -> get('edate');
        $sdate = $request -> get('sdate');
        $results = array();
        foreach ($numbers as $number) {
            $results [] = $this -> returnNumberHistory($number, $edate, $sdate);
        }

        return view('history.historie',compact('results', 'edate', 'sdate'));
      }

    public function returnNumberHistory($num, $edate, $sdate){

        $number = $num;

        $results = array();
        $lot = array();
        $tickets = Ticket::whereDate('created_at', '>=', $sdate)->whereDate('created_at', '<=', $edate)->get();
        
        foreach ($tickets as $ticket) {
           $tnumbers = $ticket -> num;           
           
           if(in_array($number, $tnumbers)){
            $results[] = $ticket;
           } 
        }

        $total_plays = count($results);
        $total_playing = 0;
       

        foreach ($results as $result) {

            $lotteries = $result->lotteries()->pluck('name')->toArray();
            
            foreach ($lotteries as $lottery) {
                if(!in_array($lottery, $lot)){
                    $lot[] = $lottery;
                } 
            }
            $val = $result -> get('num');
            $total = $result['total'];
            $count_numbers = count($val);
            $count_nu = $count_numbers * count($lotteries);
            
            $div = $total / $count_nu ;
            $div = ceil($div);
            $total_playing = $total_playing + $div;
        }

        return [
            'number' => $number,
            'total_plays' => $total_plays,
            'total_playing' =>  $total_playing,
            'lot' =>  $lot
        ];
    }


    public function create()
    {
        $lotteries = Lottery::pluck('name','id')->all();
        return view('history.create',compact('lotteries'));
    }
  

    public function show($id) {
        $histories = History::find($id);
        return view('history.show', compact( 'histories'));
    }

    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'day'  => 'required',
            'winner'  => 'required',
            'lottery_id' => 'required'
         ]);

        $history = new History();
        $day = $request->get('day');
        $tickets = Ticket::whereDate('created_at', '=', $day)->get();
        $results = array();
        $lots = array();
        foreach ($tickets as $ticket) {
            $numbers = $ticket -> num;
            if(in_array($request->get('winner'), $numbers)){
             
             $results[] = $ticket;
            } 
         }
        $id = $request->input('lottery_id');
        $lot = Lottery::where('id', $id)->pluck('name')[0];
        $total_playing = 0;

        foreach ($results as $result) {

            $lotteries = $result->lotteries()->pluck('name')->toArray();
            
            if(in_array($lot, $lotteries)){
                $val = $result-> getAttributes()['num'];
                $total = $result['total'];
                $count_numbers = count($val);
                $count_nu = $count_numbers * count($lotteries);
                $div = $total/ $count_nu ;
                $div = ceil($div);
                $total_playing = $total_playing + $div;
                $lots[] = $result;
            } 
        }
        $total_result = count($lots);
        $history->day = $request->get('day');
        $history->total = $total_playing;
        $history->total_count = $total_result;
        $history->winner = $request->get('winner');
        $id = $request->input('lottery_id');
        $lottery = Lottery::find($id);

        $history->lottery = $lottery->name;
        $history -> save();
        // 
        return redirect()->route('history.index')->with('success' , 'Historia creada con exito');
    }

    public function edit(Request $request, $id) {
        $history = History::find($id);
        $lotteries = Lottery::pluck('name','id')->all();

        return view('history.edit', compact('history', 'lotteries'));
      }

    public function update(Request $request, $id) {

        // Form validation
        $this->validate($request, [
            'day',
            'total_count' => 'required',
            'total' => 'required',
            'winner',
            'lottery_id' => 'required'
         ]);

        //  Store data in database
        History::create($request->all());


        $history = History::find($id);
        $history->day = $request->get('day');
        $history->total = $request->get('total');
        $history->winner = $request->get('winner');
        $lottery = Lottery::find($request->input('lottery_id'));

        $history->lottery()->save($lottery);

        // 
        return redirect()->route('history.index')->with('success' , 'Historia creada con exito');
    }

    public function destroy($id)
    {
        DB::table("histories")->where('id',$id)->delete();
        return redirect()->route('history.index')->with('success','historial eliminado exitosamente');
    }



}
