<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contact', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();

        if ($request->whatsapp) {
            $validated = $request->validate([
                'whatsapp' => 'string|max:25',
            ]);

            $contact->name = 'whatsapp';
            $contact->handler = $validated['whatsapp'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->skype) {
            $validated = $request->validate([
                'skype' => 'string|max:25',
            ]);

            $contact->name = 'skype';
            $contact->handler = $validated['skype'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->facebook) {
            $validated = $request->validate([
                'facebook' => 'string|max:25',
            ]);

            $contact->name = 'facebook';
            $contact->handler = $validated['facebook'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->twitter) {
            $validated = $request->validate([
                'twitter' => 'string|max:25',
            ]);

            $contact->name = 'twitter';
            $contact->handler = $validated['twitter'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->telegram) {
            $validated = $request->validate([
                'telegram' => 'string|max:25',
            ]);

            $contact->name = 'telegram';
            $contact->handler = $validated['telegram'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->skype) {
            $validated = $request->validate([
                'skype' => 'string|max:25',
            ]);

            $contact->name = 'skype';
            $contact->handler = $validated['skype'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->email) {
            $validated = $request->validate([
                'email' => 'string|email|max:25',
            ]);

            $contact->name = 'email';
            $contact->handler = $validated['email'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->phone) {
            $validated = $request->validate([
                'phone' => 'string|max:25',
            ]);

            $contact->name = 'phone';
            $contact->handler = $validated['phone'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
        if ($request->youtube) {
            $validated = $request->validate([
                'youtube' => 'string|max:25',
            ]);

            $contact->name = 'youtube';
            $contact->handler = $validated['youtube'];
            $contact->save();
            return redirect()->back()->with('success', 'Contact added!');
        }
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

    public function adminIndex() {
        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function adminEdit(Contact $contact) 
    {   
        return view('admin.contact.edit', compact('contact'));
    }

    public function adminUpdate(Request $request, Contact $contact) 
    {   
        $validatedData = $request->validate([
            'handler' => 'required|string|max:25'
        ]);
        $contact->update([
            'handler' => $validatedData['handler']
        ]);
        return redirect()->to(route('admin.contacts.all'))->with('success', 'Contact Updated!');
    }

    public function adminDelete(Contact $contact) 
    {
        $contact->delete();
        return redirect()->to(route('admin.contacts.all'))->with('success', 'Deleted!');
        
    }
}
