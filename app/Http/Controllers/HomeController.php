<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tickets = DB::select('select * from tickets');
        $total_value = 0;
        foreach ($tickets as  $value) {
            $total_value = $value->total + $total_value;
        }
        $numbers = DB::select('select * from numbers');
        $total_tickets = count($tickets);
        return view('dashboard', ['total_value' => $total_value, 'total_tickets' => $total_tickets]);
    }

    public function delete_all()
    {
        $tickets = Ticket::all();
        $numbers = Number::all();
 
        foreach ($tickets as $value) {
            $value->delete();
        }
        foreach ($numbers as $value) {
            $value->delete();
        }
        return redirect('dashboard')->with('success','Los boletos y loterias han sido eliminados');
    }
}
