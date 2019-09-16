<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tractor extends Model
{
    public function processed_field()
    {
        return $this->hasMany('App\Processed_field');
    }
}
