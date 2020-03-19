<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $fillable = [
        'ammount',
        'purchased',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
