<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opening extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'ship_id',
        'ship_name',
        'bridge_id',
        'bridge_name',
        'user_id',
        'user_name'
    ];

    public function ship()
    {
        return $this->belongsTo('App\Ship');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bridge()
    {
        return $this->belongsTo('App\Bridge');
    }
}


