<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function reports(): HasMany
    {
        return $this->hasMany('App\Report');
    }

    /**
     * @return HasMany
     */
    public function reportViews(): HasMany
    {
        return $this->hasMany('App\ReportView');
    }
}
