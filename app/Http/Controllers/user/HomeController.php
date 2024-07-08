<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $currencies = Currency::all();
        $transactions = Transaction::where('status', 2)->orderBy('created_at', 'desc')->limit(10)->get();

        return view('index', compact('currencies', 'transactions'));
    }
}
