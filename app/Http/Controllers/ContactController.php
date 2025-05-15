<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.Contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Contact.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);


        Contact::create($request->all());
        



        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->route('contact.index')->with('error', 'Contact not found');
        }
        return view('admin.Contact.edit', compact('contact'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $contact = Contact::find($id);


        $contact->update($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
          
            $contact->delete();
            return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
        } else {
            return redirect()->route('contact.index')->with('error', 'Contact not found.');
        }
    }
}
