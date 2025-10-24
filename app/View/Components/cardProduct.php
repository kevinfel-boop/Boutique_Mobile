<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardProduct extends Component
{
    // information sur le produit
    public $product;
    /**
     * Create a new component instance.
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = Product::All();
        return view('components.card-product', compact('products'));
    }
}
