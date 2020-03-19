<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;

    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function reportViews()
    {
        return $this->hasMany('App\ReportView');
    }

}
