<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope{

  
  function apply(Builder $builder, Model $model)
  {

    if($companyId = request('company_id')){
      $builder->where('company_id', $companyId);
    }
  }
}