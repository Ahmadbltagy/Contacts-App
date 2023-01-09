<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address','company_id'];
    function company(){
        
        return $this->belongsTo(Company::class);
    }
    use HasFactory;
}
