<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|min:10',
            'address' => 'required|min:10',
            'email' => 'required|min:10',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'email' => $request->email,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('supplier.index')->with(['success' => 'Successfully Added Supplier!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit(string $id): View
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|min:10',
            'address' => 'required|min:10',
            'email' => 'required|min:10',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'email' => $request->email,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('supplier.index')->with(['success' => 'Successfully Updated Supplier!']);
    }

    public function destroy($id): RedirectResponse
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with(['success' => 'Successfully Deleted Supplier!']);
    }
}
