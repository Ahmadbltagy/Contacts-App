<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index(){
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Companies", '');
        $contacts = Contact::latestFirst()->paginate(10);
        return view('contacts.index', compact('contacts', 'companies'));

    }
    function show($id){
        $contact =  Contact::findOrFail($id);
        return view("contacts.show", compact('contact'));
    }

    function create(){
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Companies", '');

        return view('contacts.create', compact('companies', 'contact'));
    }

    function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'  => 'required | email',
            'phone' => 'required',
            'address' => 'required',
            'company_id'=> 'required|exists:companies,id'
        ]);

        Contact::create($request->all());    
        return redirect()->route('contacts.index')->with("message", "Contacts has been added successfully");
    
    }

    function edit($id){
        $contact =  Contact::findOrFail($id);
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Companies", '');

        return view('contacts.edit', compact('contact', 'companies'));
    }

    function update($id, Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'  => 'required | email',
            'phone' => 'required',
            'address' => 'required',
            'company_id'=> 'required|exists:companies,id'
        ]);

        $contact = Contact::find($id);    
        $contact->update($request->all());
        
        return redirect()->route('contacts.index')->with("message", "Contacts has been updated successfully");
    
    }

    function destroy($id){
        Contact::findOrFail($id)->delete();     
        return back()->with("message", "Contact has been deleted successfully");
    }
}
