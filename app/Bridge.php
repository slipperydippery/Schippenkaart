<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bridge extends Model
{
    public function openings()
    {
        return $this->hasMany('App\Opening');
    }
}
