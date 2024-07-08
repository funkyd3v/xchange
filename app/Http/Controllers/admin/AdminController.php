<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Rate;
use App\Models\Testimonial;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalCurrency = Currency::count();
        $totalTransaction = Transaction::count();
        $totalTestimonial = Testimonial::count();

        return view('admin.index', compact('totalUser', 'totalCurrency', 'totalTransaction', 'totalTestimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function transactions()
    {
        $transactions = Transaction::orderBy('status', 'asc')->orderBy('created_at', 'desc')->get(); 

        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', 'integer'],
        ]);

        $transaction = Transaction::findOrFail($id);
        // $user = User::findOrFail($transaction->user_id);

        if ($validatedData && $transaction) {
            $transaction->status = $validatedData['status'];
            $transaction->save();

            if ($transaction->status == 2) {
                $sendCurrency = Currency::find($transaction->send_currency);
                $receiveCurrency = Currency::find($transaction->receive_currency);
                $sendAmount = $transaction->send_currency_amount;
                $receiveAmount = $transaction->receive_currency_amount;
            
                
                $sendCurrency->update([
                    'amount' => floatval($sendCurrency->amount) + floatval($sendAmount)
                ]);
                $receiveCurrency->update([
                    'amount' => floatval($receiveCurrency->amount) - floatval($receiveAmount)
                ]);
            }

            return redirect()->back()->with('success', 'Status changed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
