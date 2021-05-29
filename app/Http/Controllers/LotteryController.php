<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
{
    //
    public function createForm(Request $request) {
        return view('lottery');
    }


    public function LotteryForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required'
         ]);

        //  Store data in database
        Lottery::create($request->all());

        // 
        return back()->with('success');
    }
}
