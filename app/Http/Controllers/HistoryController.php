<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Lottery;
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
        $histories = History::orderBy('id','ASC')->paginate(5);
        return view('history.index',compact('histories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
            'total' => 'required',
            'winner'  => 'required',
            'lottery_id' => 'required'
         ]);

        $history = new History();
        
        $history->day = $request->get('day');
        $history->total = $request->get('total');
        $history->winner = $request->get('winner');
        $lottery = Lottery::find($request->input('lottery_id'));

        $history->save();
        $history->lottery()->save($lottery);

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
