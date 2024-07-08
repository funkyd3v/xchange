<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class RateController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Rate::class);
        $rates = Rate::with('currency')->get();

        return view('admin.rate.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Rate::class);
        $currencies = Currency::all();

        return view('admin.rate.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Rate::class);

        $validatedData = $request->validate([
            'currency_id' => 'required|numeric',
            'buy_rate' => 'required|string|max:15',
            'sale_rate' => 'required|string|max:15',
        ]);

        $currency = Currency::find($validatedData['currency_id']);
        if ($currency) {
            $currency->rates()->create([
                'buy_rate' => $validatedData['buy_rate'],
                'sale_rate' => $validatedData['sale_rate']
            ]);
        }else{
            return redirect()->back()->with('error', 'Currency not found!');
        }

        return redirect()->back()->with('success', 'Rate created!');
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
    public function edit(Rate $rate)
    {
        $this->authorize('update', $rate);
        return view('admin.rate.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rate $rate)
    {
        $this->authorize('update', $rate);
        $validatedData = $request->validate([
            'buy_rate' => 'required|string|max:10',
            'sale_rate' => 'required|string|max:10',
        ]);

        $rate->update($validatedData);

        return redirect()->to(route('admin.rate.index'))->with('success', 'Currenct rate updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        $this->authorize('delete', $rate);
        $rate->delete();

        return redirect()->to(route('admin.rate.index'))->with('success', 'Deleted!');
    }

    public function rates() {
        $rates = Rate::all();

        return view('rates', compact('rates'));
    }
}
