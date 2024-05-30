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
          {{-- create product --}}
          <div class="container mx-auto mt-5 mb-5">
            <div class="shadow-sm rounded-md p-5">
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-4">
                  <label class="font-semibold">Image</label>
                  <input type="file"
                    class="p-2 w-full mt-1 border border-black rounded-md @error('image') border-2 border-red-500 @enderror"
                    name="image">

                  <!-- error message untuk image -->
                  @error('image')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Title</label>
                  <input type="text"
                    class="p-2 w-full mt-1 rounded-md @error('title') border-2 border-red-500 @enderror" name="title"
                    value="{{ old('title') }}" placeholder="Product Title">

                  <!-- error message untuk title -->
                  @error('title')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Description</label>
                  <textarea class="p-2 w-full mt-1 rounded-md @error('description') border-2 border-red-500 @enderror"
                    name="description" rows="5" placeholder="Product Description">{{ old('description') }}</textarea>

                  <!-- error message untuk description -->
                  @error('description')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                  <div>
                    <label class="font-semibold">Price</label>
                    <input type="number"
                      class="p-2 w-full mt-1 rounded-md @error('price') border-2 border-red-500 @enderror" name="price"
                      value="{{ old('price') }}" placeholder="Product Price">

                    <!-- error message untuk price -->
                    @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div>
                    <label class="font-semibold">Quantity</label>
                    <input type="number"
                      class="p-2 w-full mt-1 rounded-md @error('quantity') border-2 border-red-500 @enderror"
                      name="quantity" value="{{ old('quantity') }}" placeholder="Product Quantity">

                    <!-- error message untuk quantity -->
                    @error('quantity')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Supplier</label>
                  <select class="p-2 w-full mt-1 rounded-md @error('supplier_id') border-2 border-red-500 @enderror"
                    name="supplier_id">
                    <option value="" disabled selected>Select Supplier</option>
                    @foreach ($suppliers as $supplier)
                    <option name="supplier_id" value="{{ $supplier->id }}" {{ old('supplier_id') }}>{{ $supplier->name }}</option>
                    @endforeach
                  </select>

                  <!-- error message untuk supplier_id -->
                  @error('supplier_id')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mt-4">
                  <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                  <a href="{{ route('product.index') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>