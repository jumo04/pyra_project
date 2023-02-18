<?php

namespace App\Http\Controllers;

use App\Models\Unique;
use Illuminate\Http\Request;

class UniqueController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:unico-listar', ['only' => ['index']]);
         $this->middleware('permission:unico-crear', ['only' => ['create','store']]);
         $this->middleware('permission:unico-editar', ['only' => ['edit','update']]);
    }

    //

    public function index(Request $request)
    {
        $unique = Unique::first();
        return view('closetime.index',compact('unique'));

    }



    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'time' => 'required',
            'block'
         ]);
        //  Store data in database

        Unique::create($request->all());

        //
        return back()->with('success');
    }

    public function edit($id)
    {
        $unique = Unique::find($id);
        return view('closetime.edit', compact('unique'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'time' => 'required',
            'block'
         ]);

        $unique = Unique::find($id);
        $unique->time = $request->get('time');
        $unique->save();

        return redirect()->route('unique.index')->with('success','Registro actualizado');
    }


}
