<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request) {
        Contact::create($request->validated());
        return back()->with('success', 'Message sent successfully!');
    }

    public function index() {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }
}
