<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index(){
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Companies", '');
        $contacts = Contact::orderBy('first_name')->where(function($query){
            if($companyId = request('company_id')){
                $query->where('company_id', $companyId);
            }
        })->paginate(10);
        return view('contacts.index', compact('contacts', 'companies'));

    }
    function create(){
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Companies", '');
        return view('contacts.create', compact('companies'));
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
        dd($request->only('first_name', 'last_name'));
    }

    function show($id){
        $contact =  Contact::find($id);
        return view("contacts.show", compact('contact'));
    }
}
