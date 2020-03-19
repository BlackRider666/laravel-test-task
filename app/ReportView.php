<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportView extends Model
{
    protected $table = 'report_views';

    protected $fillable = [
        'total_views',
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
