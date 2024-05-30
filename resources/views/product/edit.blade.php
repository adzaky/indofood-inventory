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
          {{-- edit product --}}
          <div class="container mx-auto mt-5 mb-5">
            <div class="shadow-sm rounded-md p-5">
              <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PATCH')

                <div class="mb-4">
                  <label class="font-semibold">Image</label>
                  <input type="file"
                    class="p-2 w-full mt-1 border-2 rounded-md @error('image') border-red-500 @enderror" name="image">

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
                    class="p-2 w-full mt-1 border-2 rounded-md @error('title') border-red-500 @enderror" name="title"
                    value="{{ old('title', $product->title) }}" placeholder="Product Title">

                  <!-- error message untuk title -->
                  @error('title')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Description</label>
                  <textarea class="p-2 w-full mt-1 border-2 rounded-md @error('description') border-red-500 @enderror"
                    name="description" rows="5"
                    placeholder="Product Description">{{ old('description', $product->description) }}</textarea>

                  <!-- error message untuk description -->
                  @error('description')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="font-semibold">Price</label>
                    <input type="number"
                      class="p-2 w-full mt-1 border-2 rounded-md @error('price') border-red-500 @enderror" name="price"
                      value="{{ old('price', $product->price) }}" placeholder="Product Price">

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
                      class="p-2 w-full mt-1 border-2 rounded-md @error('quantity') border-red-500 @enderror"
                      name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="Product Quantity">

                    <!-- error message untuk quantity -->
                    @error('quantity')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="mt-4">
                  <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                  <a href="{{ route('product.index') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md inline-block mb-1">Back</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>