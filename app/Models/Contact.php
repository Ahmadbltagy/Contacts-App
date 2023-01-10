<?php

namespace App\Models;

use App\Scopes\ContactSearchScope;
use App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address','company_id'];
    function company(){
        
        return $this->belongsTo(Company::class);
    }

    function scopeLatestFirst($query){
        return $query->orderBy('id', 'DESC');
    }

    static function booted(){
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }
    use HasFactory;
}
