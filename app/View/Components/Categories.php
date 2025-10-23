<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Categories extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // recuperation de toute nos catégorie à l'aide du model categorie
        $categories = Category::Limit(5)->get();


        return view('components.categories', compact('categories'));
    }
}
