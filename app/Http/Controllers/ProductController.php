<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $suppliers = Supplier::all();
        return view('product.create', compact('suppliers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'supplier_id' => $request->supplier_id,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('product.index')->with(['success' => 'Successfully Added Product!']);
    }


    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            Storage::delete('public/products/' . $product->image);

            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'updated_by' => Auth::id(),
            ]);
        } else {
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'updated_by' => Auth::id(),
            ]);
        }

        return redirect()->route('product.index')->with(['success' => 'Successfully Updated Product!']);
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/products/' . $product->image);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'Successfully Deleted Product!']);
    }
}
