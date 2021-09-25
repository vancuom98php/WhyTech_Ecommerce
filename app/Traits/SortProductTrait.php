<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Product;

trait SortProductTrait
{
    public function SortProduct($products, $sort_by)
    {
        if ($sort_by == 'new')
            return $products->latest()->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'old')
            return $products->oldest()->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'az')
            return $products->orderBy('product_name', 'asc')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'za')
            return $products->orderBy('product_name', 'desc')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'inc')
            return $products->orderBy('product_price', 'asc')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'desc')
            return $products->orderBy('product_price', 'desc')->paginate(9)->appends(request()->query());
    }

    public function SortProductByCategory($productByCategorySlugs, $sort_by)
    {
        if ($sort_by == 'new')
            return $productByCategorySlugs->sortByDesc('created_at')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'old')
            return $productByCategorySlugs->sortBy('created_at')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'az')
            return $productByCategorySlugs->sortBy('product_name')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'za')
            return $productByCategorySlugs->sortByDesc('product_name')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'inc')
            return $productByCategorySlugs->sortBy('product_price')->paginate(9)->appends(request()->query());
        elseif ($sort_by == 'desc')
            return $productByCategorySlugs->sortByDesc('product_price')->paginate(9)->appends(request()->query());
    }
}
