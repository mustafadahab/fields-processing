<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processed_field extends Model
{
    public function field()
    {
        return $this->belongsTo('App\Field','field_id');
    }
    public function tractor()
    {
        return $this->belongsTo('App\Tractor','tractor_id');
    }
}
