<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lottery;
use App\Models\Number;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


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
        $winners = History::orderBy('day', 'asc')->limit(4)->get();
        $total_tickets = count($tickets);
        $lotteries = Lottery::where('block', false)->orderBy('name', 'asc')->get();
        return view('dashboard', ['total_value' => $total_value, 'total_tickets' => $total_tickets, 'winners' => $winners , 'lotteries' => $lotteries]);
    }

    public function delete_all()
    {
        $numbers = Number::all();
        $ticket = Ticket::all();

        $nums = DB::table('numbers')->pluck('total')->toArray();
        $valor_total = array_sum($nums);

        $timenow = date('d-m');
        $aweek = date('d-m', strtotime('-1 week', strtotime(date('d-m-Y'))));
    

        // share data to view
        $pdf = PDF::loadView('pdf_view',compact('ticket', 'numbers', 'valor_total'));

        // download PDF file with download method
        return $pdf->download('Reporte Semanal'.$timenow . 'hasta'. $aweek);
        foreach ($ticket as $value) {
            $value->delete();
        }
        foreach ($numbers as $value) {
            $value->delete();
        }
        return redirect('dashboard')->with('success','Los boletos y loterias han sido eliminados');
    }
}
