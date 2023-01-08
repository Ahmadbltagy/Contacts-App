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
        return view('contacts.create');

    }

    function show($id){
        $contact =  Contact::find($id);
        return view("contacts.show", compact('contact'));
    }
}
