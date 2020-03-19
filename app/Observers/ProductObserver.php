<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    public function saved(Product $product)
    {
        $product->reportViews()->create([
            'total_views'   => 0,
            'user_id'       => auth()->id(),
        ]);
    }
}
