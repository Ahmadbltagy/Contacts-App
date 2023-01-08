<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    function contact(){
        return $this->hasMany(Contact::class);
    }
    use HasFactory;
}
