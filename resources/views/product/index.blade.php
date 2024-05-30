<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Products') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- index product --}}
          <div class="container mx-auto p-8">
            <div class="flex justify-between items-center">
              <h1 class="text-3xl font-bold mb-2">All Products</h1>
              @if (auth()->user()->role == 'admin')
              <a href="{{ route('product.create') }}" class="text-white">
                <button class="bg-blue-500 rounded px-4 py-2 hover:bg-blue-500/90">
                  Add Product
                </button>
              </a>
              @endif
            </div>

            <div class="overflow-x-scroll">
              <table id="dataTables" class="table-auto border-collapse w-full mt-4">
                <thead>
                  <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Quantity</th>
                    <th class="border px-4 py-2">Supplier</th>
                    @if (auth()->user()->role == 'admin')
                    <th class="border px-4 py-2">Action</th>
                    @endif
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
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded mx-auto">
                      </a>
                    </td>
                    <td class="border px-4 py-2">{{ $product->title }}</td>
                    <td class="border px-4 py-2">{{ $product->description }}</td>
                    <td class="border px-4 py-2">{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                    <td class="border px-4 py-2">{{ $product->quantity }}</td>
                    <td class="border px-4 py-2">{{ $product->supplierId->name }}</td>
                    <td class="border px-4 py-2">
                      <form onsubmit="return confirm('Are You Sure?');"
                        action="{{ route('product.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('product.show', $product->id) }}"
                          class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Show</a>
                        @if (auth()->user()->role == 'admin')
                        <a href="{{ route('product.edit', $product->id) }}"
                          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                          class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Delete</button>
                        @endif
                      </form>
                    </td>
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