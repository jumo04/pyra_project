<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:loteria-listar|loteria-crear|loteria-editar|loteria-delete', ['only' => ['index','show']]);
         $this->middleware('permission:loteria-crear', ['only' => ['create','store']]);
         $this->middleware('permission:loteria-editar', ['only' => ['edit','update']]);
    }

    //

    public function index(Request $request)
    {
        $loterries = Lottery::orderBy('id','ASC')->paginate(5);
        return view('lotteries.index',compact('loterries'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    public function create()
    {
        return view('lotteries.create');
    }


    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'block' => 'required'
         ]);
        
         $lotteries = new Lottery();
         $lotteries->name = $request->get('name');
         $lotteries->close = $request->get('close');
         $val = $request->get('block');

         if($val == "on"){
            $lotteries->block = true;
         }else{
            $lotteries->block = false;
         }
         $lotteries->save();

        //  Store data in database
        // 
        return back()->with('success');
    }

    public function edit($id)
    {   
        $lottery = Lottery::find($id);
        return view('lotteries.edit', compact('lottery'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'block' => 'required'
        ]);

        $lotteries = Lottery::find($id);
        $lotteries->name = $request->get('name');
        $lotteries->close = $request->get('close');
        $val = $request->get('block');

        if($val == "on"){
            $lotteries->block = true;
        }else{
            $lotteries->block = false;
        }

        $lotteries->save();

        return redirect()->route('lotteries.index')->with('success','Loteria actualizado');
    }
    
}
