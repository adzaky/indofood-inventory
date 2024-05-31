<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        $suppliers = Supplier::latest()->paginate(10);
        
        $totalProducts = $products->total();
        $totalSuppliers = $suppliers->total();
        
        return view('dashboard', compact('products', 'suppliers', 'totalProducts', 'totalSuppliers'));
    }
}
