<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Rate;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('user.exchange', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'send_currency' => 'required|string|max:255',
            'receive_currency' => 'required|string|max:255',
            'send_currency_amount' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $send_currency = Currency::find($validatedData['send_currency']);
        $receive_currency = Currency::find($validatedData['receive_currency']);

        if ($send_currency->dollar === $receive_currency->dollar) {
            return redirect()->back()->with('error', 'You can not exchange same currency');
        }

        $rate = Rate::where('currency_id', $receive_currency->id)->first();
        
        $transaction = new Transaction();
        $transaction->send_currency = $validatedData['send_currency'];
        if ($send_currency->dollar === true) {
            $transaction->receive_currency_amount = $validatedData['send_currency_amount'] * $rate->sale_rate;
        } else {
            $transaction->receive_currency_amount = $validatedData['send_currency_amount'] * $rate->buy_rate;
        }
        
        $transaction->receive_currency = $validatedData['receive_currency'];
        $transaction->send_currency_amount = $validatedData['send_currency_amount'];
        
        $transaction->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'transaction_'.time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/transactions/' . $filename;
            $file->move(public_path('images/transactions'), $filename);
            $transaction->image = $filePath;
        }

        $transaction->save();

        return redirect()->back()->with('success', 'Your transaction in queue!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
