<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    // protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];
    function index(){

    }
    function getAllCompany(){
        $companies = Company::pluck('name', 'id')->all();
        return view('contacts._filter', compact('companies'));
   
    }
}
