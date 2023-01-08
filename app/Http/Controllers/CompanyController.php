<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    function index(){

    }
    function getAllCompany(){
        $companies = Company::pluck('name', 'id')->all();
        return view('contacts._filter', compact('companies'));
   
    }
}
