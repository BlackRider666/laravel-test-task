<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    /**
     * @param Product $product
     */
    public function saved(Product $product): void
    {
        $product->reportViews()->create([
            'total_views'   => 0,
            'user_id'       => auth()->id(),
        ]);
    }
}
