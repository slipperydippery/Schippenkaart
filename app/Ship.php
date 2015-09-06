<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'name',
        'owner_first',
        'owner_last',
        'owner_email',
        'strippen_total'
    ];

    public function openings()
    {
        return $this->hasMany('App\Opening');
    }
}
