<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Unique;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Num;
use App\Models\Lottery;
use App\Models\NumLottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Datatables;


class TicketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* function __construct()
    {
         $this->middleware('permission:tiquete-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    } */

    function __construct()
    {
         $this->middleware('permission:listar-numeros|crear-numeros|editar-numeros|eliminar-numeros', ['only' => ['show_number']]);
    }

    public function createForm(Request $request) {
        $lotteries = DB::select('select * from lotteries where block=false');
        $unique = Unique::first();
        return view('ticket',  ['lot' => $lotteries, 'unique' => $unique->block]);
      }


    public function show_ticket(Request $request){
        $ticket = Ticket::all();
        return view('pages.show_ticket',  ['ticket' => $ticket]);
    }

    public function show_number(Request $request){
        $numbers = Number::orderBy('id','ASC')->paginate(10);

        $nums = DB::table('numbers')->pluck('total')->toArray();
        $valor_total = array_sum($nums);
        $block = $numbers->sortBy('block')->pluck('block')->unique();
        return view('pages.show_number', compact('numbers', 'valor_total', 'block'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function TicketForm(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'num',
            'lottery_id' => 'required',
            'total'=>'required',
         ]);


        $val = $request->input('num');
        if($val == null){
            return back()->with('error', 'Los números ' . ' estan vacios');
        }
        $composs = '';
        $count = 0;
        foreach ($val as $value) {
           if (!$this->ifBlock($value)) {
                $composs = $composs . ' ' . $value;
                $count++;
            }
        };
        if($count > 0){
            return back()->with('error', 'Los números '. $composs . ' estan bloqueados');
        }

        $ticket = new Ticket();
        $ticket->name = $request->get('name');
        $ticket->num = $request->get('num');
        $ticket->total = $request->get('total');

        $lotteries = $request->get('lottery_id');
        $ticket->name = $request->get('name');
        $ticket->created_at = now()->format('Y-m-d');
        $ticket->updated_at = now()->format('Y-m-d');
        $ticket ->save();
        $user = User::find(auth()->id());
        $user->tickets()->save($ticket);
        $ticket->lotteries()->sync($lotteries);

        $count_numbers = count($val);
        $count_nu = $count_numbers * count($lotteries);

        $div = $ticket['total'] / $count_nu ;
        $div = ceil($div);

        $this->storeNumber($val, $div, $lotteries);


        return back()->with('success', 'Se ha creado el boleto');

    }

    public function storeNumber($request, $div, $lotteries){
        //revisar
        foreach ($request as $value) {
            $num = Num::where('num', $value)->get()->first();

            if(is_null($num) ){
                $number = Number::create(['num' => $value, 'total' => $div, 'total_count' => 1]);
                $num = Num::create(['num' => $value]);
                foreach ($lotteries as $value) {
                    $lottery = Lottery::find($value);
                    $numlot = new NumLottery();
                    $numlot -> total = $div;
                    $numlot ->total_count = 1;
                    // $numlot->num()->save($num);
                    $numlot ->save();
                    $lottery ->numlotteries()->save($numlot);
                    $num ->numlotteries()->save($numlot);
                    $numlot ->save();
                }
            }elseif(empty($num)) {
                $number = Number::create(['num' => $value, 'total' => $div, 'total_count' => 1]);
                $num = Num::create(['num' => $value]);
                foreach ($lotteries as $value) {
                    $lottery = Lottery::find($value);
                    $numlot = new NumLottery();
                    $numlot -> total = $div;
                    $numlot ->total_count = 1;
                    // $numlot->num()->save($num);
                    $numlot ->save();
                    $lottery ->numlotteries()->save($numlot);
                    $num ->numlotteries()->save($numlot);
                    $numlot ->save();

                }
            }else{
                $today = date("Y-m-d");

                foreach ($lotteries as  $value) {
                    $lottery = Lottery::find($value);
                    $numlot = $num->numlotteries()->where('lottery_id','=',$value)->whereDate('created_at', '=', $today)->first();
                    if (is_null($numlot)) {
                        $numlot = new NumLottery();
                        $numlot -> total = $div;
                        $numlot ->total_count = 1;
                        // $numlot->num()->save($num);
                        $numlot ->save();
                        $lottery ->numlotteries()->save($numlot);
                        $num ->numlotteries()->save($numlot);
                        $numlot ->save();
                    }elseif(empty($num)){
                        $numlot = new NumLottery();
                        $numlot -> total = $div;
                        $numlot ->total_count = 1;
                        // $numlot->num()->save($num);
                        $numlot ->save();
                        $lottery ->numlotteries()->save($numlot);
                        $num ->numlotteries()->save($numlot);
                        $numlot ->save();
                    }else{
                        $numlot = $num->numlotteries()->where('lottery_id','=',$value)->whereDate('created_at', '=', $today)->first();
                        $numlot['total_count'] = $numlot['total_count'] + 1;
                        $numlot['total'] = $div + $numlot['total'];
                        $numlot ->save();
                    }
                    $number = Number::where('num', $num-> num)->get()->first();
                    //dividir el precio por numero para agregarlo al numero y asi sumarlo
                    $number['total_count'] = $number['total_count'] + 1;
                    $number['total'] = $div + $number['total'];
                    $number->save();
                }
            }
        }
    }

    public function ifBlock($request){
        $numbers = DB::table('numbers')->pluck('num')->toArray();
        if(!in_array($request, $numbers)) {
             return true;
        }else{
            $number = Number::where('num', $request)->get()->first();
            $prove = $number['block'];
            if($prove == true){
                   return false;
            }else{
                  return true;
                }
            }
    }

    public function destroy($id)
    {
        DB::table("tickets")->where('id',$id)->delete();
        return redirect()->route('show_ticket')->with('success','Boleto eliminado exitosamente');
    }

}
