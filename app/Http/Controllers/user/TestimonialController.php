<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
    
        return view('user.testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create-testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'review' => 'required|string|max:255',
            'rating' => 'required|numeric',
        ]);

        $testimonial = new Testimonial();
        $testimonial->review = $validatedData['review'];
        $testimonial->rating = $validatedData['rating'];
        $testimonial->user_id = Auth::user()->id;
        $testimonial->save();

        return redirect()->back()->with('success', 'Your valuable review received!');
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
