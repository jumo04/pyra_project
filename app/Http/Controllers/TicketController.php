<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Number;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PDF;

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
        return view('ticket',  ['lot' => $lotteries]);
      }

    public function show_ticket(Request $request){
        $ticket = Ticket::all();
        return view('pages.show_ticket',  ['ticket' => $ticket]);
    }

    public function show_number(Request $request){
        $numbers = Number::orderBy('id','ASC')->paginate(10);
        
        $nums = DB::table('numbers')->pluck('total')->toArray();
        $valor_total = array_sum($nums);
        return view('pages.show_number', compact('numbers', 'valor_total'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function TicketForm(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'num',
            'lottery_id' => 'required',
            'total'=>'required',
        ]);

        $val = $request->input('num');
        $validator->after(function ($validator, $val) {
            if ($this->ifBlock($val)) {
                if ($validator->fails()) {
                    return back()->withErrors($validator->errors());
                }
            }
        });        

        $ticket = new Ticket();
        $ticket->name = $request->get('name');
        $ticket->num = $request->get('num');
        $ticket->total = $request->get('total');
        $lotteries = $request->get('lottery_id');
        $ticket->name = $request->get('name');
        $ticket->save();
        $user = User::find(auth()->id());
        $user->tickets()->save($ticket);
        $ticket->lotteries()->sync($lotteries);

        $count_numbers = count($val) ;
        $count_nu = $count_numbers * count($lotteries);
        
        $div = $ticket['total'] / $count_nu ;


        $this->storeNumber($val, $div);

        
        return back()->with('success', 'Se ha creado el boleto');

    }

    public function storeNumber($request, $div){

        $numbers = DB::table('numbers')->pluck('num')->toArray();

        foreach ($request as $value) {

            if (!in_array($value, $numbers)) {
                $number = Number::create(['num' => $value, 'total' => $div, 'total_count' => 1]);
                Log::info('el número ha sido guardado'.$value);
            } else {
                $number = Number::where('num', $value)->get()->first();
                //dividir el precio por numero para agregarlo al numero y asi sumarlo
                $number['total_count'] = $number['total_count'] + 1;
                $number['total'] = $div + $number['total'];
                $number->save();
                Log::info('el numero ha sido actualizado'.$value);
            } 
        }
    }

    public function ifBlock($request){
        $numbers = DB::table('numbers')->pluck('num')->toArray();
        foreach ($request as $value) {
            if (!in_array($value, $numbers)) {

            } else {
                $number = Number::where('num', $value)->get()->first();
                $prove = $number['block'];
                if($prove == 1){
                    return false;
                }else {
                    return true;
                }
                //dividir el precio por numero para agregarlo al numero y asi sumarlo
                Log::info('el numero ha sido actualizado'.$value);
            } 
        }
    }

    public function destroy($id)
    {
        DB::table("tickets")->where('id',$id)->delete();
        return redirect()->route('show_ticket')->with('success','Boleto eliminado exitosamente');
    }



}
