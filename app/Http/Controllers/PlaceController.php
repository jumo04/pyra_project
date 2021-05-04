<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //
    public function createForm(Request $request) {
        return view('place');
      }

    public function PlaceForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'place' => 'required',
            'spot'
         ]);

        //  Store data in database
        Place::create($request->all());

        // 
        return back()->with('success');
    }
}
