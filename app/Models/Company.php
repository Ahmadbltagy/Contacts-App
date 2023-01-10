<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    
    function contact(){
        return $this->hasMany(Contact::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
