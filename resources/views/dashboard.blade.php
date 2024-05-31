<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Dashboard --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Suppliers --}}
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- index supplier --}}
                    <div class="container mx-auto p-8">
                        <div class="flex justify-between items-center">
                            <h1 class="text-3xl font-bold mb-2">All Suppliers</h1>
                        </div>

                        <div class="overflow-x-scroll">
                            <table class="table-auto border-collapse w-full mt-4">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">ID</th>
                                        <th class="border px-4 py-2">Name</th>
                                        <th class="border px-4 py-2">Contact</th>
                                        <th class="border px-4 py-2">Address</th>
                                        <th class="border px-4 py-2">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                    <tr class="text-center text-nowrap">
                                        <td class="border px-4 py-2">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $supplier->name }}</td>
                                        <td class="border px-4 py-2">{{ $supplier->contact }}</td>
                                        <td class="border px-4 py-2">{{ $supplier->address }}</td>
                                        <td class="border px-4 py-2">{{ $supplier->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $suppliers->links() }}
                    </div>
                </div>
            </div>

            {{-- Products --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-8">
                        <div class="flex justify-between items-center">
                            <h1 class="text-3xl font-bold mb-2">All Products</h1>
                        </div>

                        <div class="overflow-x-scroll">
                            <table class="table-auto border-collapse w-full mt-4">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">ID</th>
                                        <th class="border px-4 py-2">Image</th>
                                        <th class="border px-4 py-2">Name</th>
                                        <th class="border px-4 py-2">Description</th>
                                        <th class="border px-4 py-2">Price</th>
                                        <th class="border px-4 py-2">Quantity</th>
                                        <th class="border px-4 py-2">Supplier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr class="text-center text-nowrap">
                                        <td class="border px-4 py-2">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <img src="{{ asset('/storage/products/'.$product->image) }}"
                                                    class="h-16 rounded mx-auto">
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">{{ $product->title }}</td>
                                        <td class="border px-4 py-2">{{ $product->description }}</td>
                                        <td class="border px-4 py-2">{{ "Rp " . number_format($product->price,2,',','.')
                                            }}</td>
                                        <td class="border px-4 py-2">{{ $product->quantity }}</td>
                                        <td class="border px-4 py-2">{{ $product->supplierId->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>