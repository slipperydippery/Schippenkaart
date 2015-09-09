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
        'owner_phonenumber',
        'strippen_total'
    ];

    public function openings()
    {
        return $this->hasMany('App\Opening');
    }

    public function userFavorite()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
