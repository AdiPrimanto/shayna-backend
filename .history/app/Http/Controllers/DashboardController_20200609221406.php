<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');

        return view('pages.dashboard');
    }
}
