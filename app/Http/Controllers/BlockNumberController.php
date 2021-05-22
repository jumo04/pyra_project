<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BlockNumberController extends Controller
{
    //

    /*   public function createForm(Request $request) {
            return view('block');
    } */

    public function BlockNumber(Request $request) {

        // Form validation
       /*  */
        foreach ($request->input('num') as $value) {
            $validator = Validator::make(['data' => $value], 
                ['data' => 'nullable|numeric|required|between:2,4']);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

         $numbers = DB::table('numbers')->pluck('num')->toArray();
         foreach ($request->input('num') as $value) {
            if (!in_array($value, $numbers)) {
                $number = Number::create(['num' => $value]);
                $number['block'] = true;
                $number->save();
            }else {
                $number = Number::where('num', $value)->get()->first();
                //dividir el precio por numero para agregarlo al numero y asi sumarlo
                $number['block'] = true;
                $number->save();
            }
         }
        return back()->with('success');
    }

    public function deBlockNumber(Request $request) {

        // Form validation
        foreach ($request->input('num') as $value) {
            $validator = Validator::make(['data' => $value], 
                ['data' => 'nullable|numeric|required|between:2,4']);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } 

         $numbers = DB::table('numbers')->pluck('num')->toArray();

         foreach ($request->input('num') as $value) {
            if (in_array($value, $numbers)) {
                $number = Number::where('num', $value)->get()->first();
                $number['block'] = false;
                $number->save();
            }
         }

        return back()->with('success');
    }
    
}
