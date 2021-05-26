<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


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
}
