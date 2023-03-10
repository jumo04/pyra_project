<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BlockNumberController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:bloquear-numero', ['only' => ['block_number', 'block' ]]);
         $this->middleware('permission:desbloquear-numero', ['only' => ['deblock_number', 'deblock']]);
    }

    public function block(Request $request) {
        return view('forms.block');
    } 

    public function deblock(Request $request) {
        $numbers = Number::where('block', 1)->pluck('num', 'id');
        return view('forms.deblock', compact('numbers'));
    } 

    public function block_number(Request $request) {

        // Form validation
       /*  */
        foreach ($request->input('num') as $value) {
            $validator = Validator::make(['data' => $value], 
                ['data' => 'nullable|numeric|required']);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

         $numbers = DB::table('numbers')->pluck('num')->toArray();
         foreach ($request->input('num') as $value) {
            if (!in_array($value, $numbers)) {
                $number = Number::create(['num' => $value, 'total_count' => 0]);
                $number['block'] = true;
                $number->save();
            }else {
                $number = Number::where('num', $value)->get()->first();
                //dividir el precio por numero para agregarlo al numero y asi sumarlo
                $number['block'] = true;
                $number->save();
            }
         }
         return redirect()->route('show_number')->with('success','El número ha sido bloqueado');
    }

    public function deblock_number(Request $request) {

        // Form validation
        foreach ($request->input('num') as $value) {
            $validator = Validator::make(['data' => $value], 
                ['data' => 'nullable|numeric|required']);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } 

         $numbers = DB::table('numbers')->pluck('num')->toArray();
         foreach ($request->input('num') as $value) {
            $num = Number::find($value)->num;
            if (!empty($num)) {
                $number = Number::find($value);
                $number->block = false;
                $number->save();
            }
         }

         return redirect()->route('show_number')->with('success','El número se ha desbloqueado');

    }
}
