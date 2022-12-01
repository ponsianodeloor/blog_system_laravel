<?php

namespace App\Http\Livewire;

use App\Services\MarketService;

use Livewire\Component;

class Product extends Component
{
    public function render(MarketService $marketService)
    {
        $categories = $marketService->getCategories();
        $products = $marketService->getProducts();

        return view('livewire.product', compact('products', 'categories'));
    }
}
