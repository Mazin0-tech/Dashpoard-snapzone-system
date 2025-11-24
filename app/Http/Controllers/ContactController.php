<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * عرض قائمة جهات الاتصال
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.Contact.index', compact('contacts'));
    }
    /**
     * عرض نموذج تعديل جهة اتصال
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.Contact.edit', compact('contact'));
    }

    /**
     * تحديث جهة اتصال موجودة
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'email2' => 'nullable|email',
            'email3' => 'nullable|email',
            'phone' => 'required|string',
            'phone2' => 'nullable|string',
            'phone3' => 'nullable|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'address' => 'nullable|string|max:500',
            'iframe' => 'nullable|string'
        ]);

        $contact->update($validated);

        return redirect()->route('contact.edit', $contact->id)
            ->with('success', 'Contact updated successfully.');
    }
}