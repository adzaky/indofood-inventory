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
          {{-- show product --}}
          <div class="container h-full m-auto p-6">
            <div class="h-48 mb-4 overflow-hidden">
              <img src="{{ asset('/storage/products/'.$product->image) }}"
                class="object-cover rounded-lg h-full mx-auto border border-black rounded-lg">
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">ID:</p>
              <p class="text-lg">{{ $product->id }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Name:</p>
              <p class="text-lg">{{ $product->title }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Category:</p>
              <p class="text-lg">{{ $product->category }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Description:</p>
              <p class="text-lg">{{ $product->description }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Price:</p>
              <p class="text-lg">{{ $product->price }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Quantity:</p>
              <p class="text-lg">{{ $product->quantity }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Created By:</p>
              <p class="text-lg">{{ $product->createdBy->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Updated By:</p>
              <p class="text-lg">{{ $product->updatedBy->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Created At:</p>
              <p class="text-lg">{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Updated At:</p>
              <p class="text-lg">{{ \Carbon\Carbon::parse($product->updated_at)->format('d M Y') }}</p>
            </div>
            <div class="mb-4">
              @if (auth()->user()->role == 'admin')
              <a href="{{ route('product.edit', $product->id) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
              @endif
              <a href="{{ route('product.index') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>