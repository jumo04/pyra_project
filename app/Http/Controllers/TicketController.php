<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    } */

    public function createForm(Request $request) {
        $lotteries = DB::select('select * from lotteries');
        $places = DB::select('select * from places');
        return view('ticket', ['lot' => $lotteries, 'place' => $places]);
      }

    public function show_ticket(Request $request){
        $ticket = DB::select('select * from tickets');
        $lotteries = DB::table('select * from lotteries');
        $places = DB::select('select * from places');
        return view('pages.show_ticket',  ['ticket' => $ticket,  'lot' => $lotteries, 'place' => $places]);
    }

    public function show_number(Request $request){
        $numbers = DB::select('select * from numbers');
        return view('pages.show_number',  ['numbers' => $numbers]);
    }

    public function TicketForm(Request $request) {

        // Form validation
        $this->validate($request, [
            
        ]);


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'num',
            'lottery_id' => 'required',
            'place_id' => 'required',
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



        $this->storeNumber($request);
        

        // Store data in database
        Ticket::create($request->all());
        
        // 
        return back()->with('bingo');
    }

    public function storeNumber($request){

        $imp = $request->input('num');
        $numbers = DB::table('numbers')->pluck('num')->toArray();

        foreach ($request->input('num') as $value) {

            if (!in_array($value, $numbers)) {
                $number = Number::create(['num' => $value]);
                Log::info('el numero ha sido guardado'.$value);
            } else {
                $number = Number::where('num', $value)->get()->first();
                $prove = $number['total_count'];
                //dividir el precio por numero para agregarlo al numero y asi sumarlo
                $number['total_count'] = $prove + 1;
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


}
