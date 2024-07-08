<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Currency::class);

        return view('admin.currency.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Currency::class);

        $request->validate([
            'name' => 'required|string|max:50',
            'amount' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'dollar' => 'required|boolean'
        ]);

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->amount = $request->amount;
        $currency->dollar = $request->dollar;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'currency_'.time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/' . $filename;
            $file->move(public_path('images'), $filename);
            $currency->image = $filePath;
        }

        $currency->save();
        return redirect()->back()->with('success', 'Currency created!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $this->authorize('create', Currency::class);

        $currencies = Currency::all();
        return view('admin.currency.show', compact('currencies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        $this->authorize('create', $currency);

        return view('admin.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $this->authorize('create', $currency);

        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'amount' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $currency->name = $validatedData['name'];
        $currency->amount = $validatedData['amount'];

        if ($request->hasFile('image')) {
            if ($currency->image && file_exists(public_path('images/' . $currency->image))) {
                unlink(public_path('images/' . $currency->image));
            }
            $file = $request->file('image');
            $filename = 'currency_'. $currency->name . '_' .time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/' . $filename;
            $file->move(public_path('images'), $filename);
            $currency->image = $filePath;
        }

        $currency->save();

        return redirect()->to('/admin/currency/show')->with('success', 'Currency updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $this->authorize('create', $currency);

        $currency->delete();
        return redirect()->to('/admin/currency/show')->with('success', 'Currency deleted!');
    }

    public function getRate(Request $request) {
        $currencyId = $request->query('id');
        $currency = Currency::where('id', $currencyId)->first();
        $rate = Rate::where('currency_id', $currency->id)->first();
        

        if ($currency) {
            return response()->json([
                'id' => $rate->id,
                'currency_id' => $rate->currency_id,
                'buy_rate' => $rate->buy_rate,
                'sale_rate' => $rate->sale_rate,
                'dollar' => $currency->dollar
            ]);
        }

        return response()->json(['error' => 'Currency not found'], 404);
    }

}
